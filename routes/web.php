<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Trang chủ
Route::get('/', function () {
    return view('home');
})->name('home');

// Test database connection
Route::get('/test-db', function () {
    try {
        $users = \App\Models\User::count();
        return response()->json([
            'status' => 'success',
            'message' => 'Database connected successfully!',
            'users_count' => $users
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Database connection failed: ' . $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ], 500);
    }
});

// Test database tables
Route::get('/test-tables', function () {
    try {
        $usersTable = \DB::select("SHOW TABLES LIKE 'users'");
        $customersTable = \DB::select("SHOW TABLES LIKE 'customers'");
        
        return response()->json([
            'status' => 'success',
            'tables' => [
                'users' => count($usersTable) > 0,
                'customers' => count($customersTable) > 0
            ]
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ], 500);
    }
});

// Test registration
Route::post('/test-register', function (\Illuminate\Http\Request $request) {
    try {
        $user = \App\Models\User::create([
            'full_name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '0123456789',
            'password_hash' => \Illuminate\Support\Facades\Hash::make('password123'),
            'role' => 'customer',
        ]);
        
        \App\Models\Customer::create([
            'customer_id' => $user->user_id,
            'driver_license_no' => 'TEST123456',
            'address' => 'Test Address',
            'balance' => 0.00,
        ]);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Test registration successful!',
            'user_id' => $user->user_id
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Test registration failed: ' . $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ], 500);
    }
});

// Test simple user creation
Route::post('/test-user', function () {
    try {
        $user = \App\Models\User::create([
            'full_name' => 'Simple Test',
            'email' => 'simple@test.com',
            'password_hash' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'customer',
        ]);
        
        return response()->json([
            'status' => 'success',
            'user_id' => $user->user_id
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ], 500);
    }
});

// Các trang chính
Route::get('/dich-vu', function () {
    return view('services');
})->name('services');

Route::get('/doi-xe', function () {
    return view('fleet');
})->name('fleet');

Route::get('/gioi-thieu', function () {
    return view('about');
})->name('about');


Route::get('/dat-xe', function () {
    return view('booking');
})->name('booking');

// Authentication Routes
Route::prefix('auth')->group(function () {
    // Auth Views
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
    
    // Auth API
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/check', [AuthController::class, 'checkAuth'])->name('auth.check');
});
