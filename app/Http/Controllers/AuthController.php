<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email là bắt buộc',
            'email.email' => 'Email không hợp lệ',
            'password.required' => 'Mật khẩu là bắt buộc',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Dữ liệu không hợp lệ',
                'errors' => $validator->errors()
            ], 422);
        }

        $credentials = $request->only('email', 'password');
        
        // Tìm user theo email
        $user = User::where('email', $credentials['email'])->first();
        
        if (!$user || !Hash::check($credentials['password'], $user->password_hash)) {
            return response()->json([
                'success' => false,
                'message' => 'Email hoặc mật khẩu không chính xác'
            ], 401);
        }

        // Đăng nhập user
        Auth::login($user, $request->has('remember'));

            // Always return JSON for AJAX requests
            $customer = $user->customer;
            return response()->json([
                'success' => true,
                'message' => 'Đăng nhập thành công',
                'user' => [
                    'id' => $user->user_id,
                    'name' => $user->full_name,
                    'email' => $user->email,
                    'role' => $user->role,
                    'balance' => $customer ? $customer->balance : 0.00,
                ]
            ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:120',
            'email' => 'required|email|unique:users,email|max:160',
            'phone' => 'required|string|max:30|unique:users,phone',
            'password' => 'required|min:6|confirmed',
            'driver_license_no' => 'nullable|string|max:60',
            'address' => 'nullable|string|max:255',
        ], [
            'full_name.required' => 'Họ tên là bắt buộc',
            'full_name.max' => 'Họ tên không được quá 120 ký tự',
            'email.required' => 'Email là bắt buộc',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email này đã được sử dụng',
            'email.max' => 'Email không được quá 160 ký tự',
            'phone.required' => 'Số điện thoại là bắt buộc',
            'phone.unique' => 'Số điện thoại này đã được sử dụng',
            'phone.max' => 'Số điện thoại không được quá 30 ký tự',
            'password.required' => 'Mật khẩu là bắt buộc',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp',
            'driver_license_no.max' => 'Số bằng lái không được quá 60 ký tự',
            'address.max' => 'Địa chỉ không được quá 255 ký tự',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Dữ liệu không hợp lệ',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Tạo user mới
            $user = User::create([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password_hash' => Hash::make($request->password),
                'role' => 'customer',
            ]);

            // Tạo customer record
            Customer::create([
                'customer_id' => $user->user_id,
                'driver_license_no' => $request->driver_license_no,
                'address' => $request->address,
                'balance' => 0.00,
            ]);

            // Đăng nhập user sau khi đăng ký
            Auth::login($user);

            // Always return JSON for AJAX requests
            $customer = $user->customer;
            return response()->json([
                'success' => true,
                'message' => 'Đăng ký thành công',
                'user' => [
                    'id' => $user->user_id,
                    'name' => $user->full_name,
                    'email' => $user->email,
                    'role' => $user->role,
                    'balance' => $customer ? $customer->balance : 0.00,
                ]
            ]);

        } catch (\Exception $e) {
            // Log the error for debugging (only log, don't include full exception)
            \Log::error('Registration error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi đăng ký. Vui lòng thử lại.'
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'success' => true,
            'message' => 'Đăng xuất thành công'
        ]);
    }

    public function checkAuth()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $customer = $user->customer;
            return response()->json([
                'authenticated' => true,
                'user' => [
                    'id' => $user->user_id,
                    'name' => $user->full_name,
                    'email' => $user->email,
                    'role' => $user->role,
                    'balance' => $customer ? $customer->balance : 0.00,
                ]
            ]);
        }

        return response()->json([
            'authenticated' => false
        ]);
    }
}
