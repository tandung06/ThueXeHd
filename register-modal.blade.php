<!-- Register Modal -->
<div id="registerModal" class="fixed inset-0 bg-transparent hidden z-50 flex items-start justify-end p-4 pt-20">
    <div class="bg-white rounded-lg modal-content shadow-2xl w-full max-w-sm max-h-[90vh] overflow-y-auto modal-scroll transform transition-all duration-300 scale-95 opacity-0" id="registerModalContent">
        <!-- Modal Header -->
        <div class="relative p-4 border-b border-gray-200 sticky top-0 bg-white">
            <h2 class="text-lg text-gray-800 text-center">Đăng ký</h2>
            <button onclick="closeRegisterModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6">
            <form id="registerForm" class="space-y-4" method="POST" action="{{ url('/register') }}">
                @csrf
                
                <!-- Full Name -->
                <div>
                    <label for="register_full_name" class="block text-sm font-medium text-gray-700 mb-1">
                        Họ và tên
                    </label>
                    <input id="register_full_name" 
                           name="full_name" 
                           type="text" 
                           autocomplete="name" 
                           required 
                           value="{{ old('full_name') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('full_name') border-red-500 @enderror"
                           placeholder="Nhập họ và tên của bạn">
                    @error('full_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="register_email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email
                    </label>
                    <input id="register_email" 
                           name="email" 
                           type="email" 
                           autocomplete="email" 
                           required 
                           value="{{ old('email') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
                           placeholder="Nhập email của bạn">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label for="register_phone" class="block text-sm font-medium text-gray-700 mb-1">
                        Số điện thoại <span class="text-gray-400">(tùy chọn)</span>
                    </label>
                    <input id="register_phone" 
                           name="phone" 
                           type="tel" 
                           autocomplete="tel" 
                           value="{{ old('phone') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('phone') border-red-500 @enderror"
                           placeholder="Nhập số điện thoại">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role Selection -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Bạn muốn sử dụng Lali như thế nào?
                    </label>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input id="register_role_renter" 
                                   name="role" 
                                   type="radio" 
                                   value="renter" 
                                   {{ old('role') == 'renter' ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <label for="register_role_renter" class="ml-3 block text-sm text-gray-700">
                                <span class="font-medium">Thuê sản phẩm</span>
                                <span class="text-gray-500 block text-xs">Tìm và thuê sản phẩm từ người khác</span>
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="register_role_owner" 
                                   name="role" 
                                   type="radio" 
                                   value="owner" 
                                   {{ old('role') == 'owner' ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <label for="register_role_owner" class="ml-3 block text-sm text-gray-700">
                                <span class="font-medium">Cho thuê sản phẩm</span>
                                <span class="text-gray-500 block text-xs">Đăng sản phẩm để cho người khác thuê</span>
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="register_role_both" 
                                   name="role" 
                                   type="radio" 
                                   value="both" 
                                   {{ old('role') == 'both' ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <label for="register_role_both" class="ml-3 block text-sm text-gray-700">
                                <span class="font-medium">Cả hai</span>
                                <span class="text-gray-500 block text-xs">Vừa thuê vừa cho thuê sản phẩm</span>
                            </label>
                        </div>
                    </div>
                    @error('role')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="register_password" class="block text-sm font-medium text-gray-700 mb-1">
                        Mật khẩu
                    </label>
                    <input id="register_password" 
                           name="password" 
                           type="password" 
                           autocomplete="new-password" 
                           required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password') border-red-500 @enderror"
                           placeholder="Nhập mật khẩu">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="register_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                        Xác nhận mật khẩu
                    </label>
                    <input id="register_password_confirmation" 
                           name="password_confirmation" 
                           type="password" 
                           autocomplete="new-password" 
                           required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Nhập lại mật khẩu">
                </div>

                <!-- Terms and Conditions -->
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="register_terms" 
                               name="terms" 
                               type="checkbox" 
                               required
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="register_terms" class="text-gray-700">
                            Tôi đồng ý với 
                            <a href="#" class="text-blue-600 hover:text-blue-500">Điều khoản sử dụng</a> 
                            và 
                            <a href="#" class="text-blue-600 hover:text-blue-500">Chính sách bảo mật</a>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" 
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Tạo tài khoản
                    </button>
                </div>
            </form>

            <!-- Switch to Login -->
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">
                    Đã có tài khoản? 
                    <button onclick="switchToLogin()" class="font-medium text-blue-600 hover:text-blue-500">
                        Đăng nhập ngay
                    </button>
                </p>
            </div>

            <!-- Social Register -->
            <div class="mt-4">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Hoặc đăng ký bằng</span>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 gap-3">
                    <button type="button" class="w-full inline-flex justify-center py-2 px-3 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <svg class="h-4 w-4" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="currentColor" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="currentColor" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="currentColor" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        <span class="ml-2">Google</span>
                    </button>
                    <button type="button" class="w-full inline-flex justify-center py-2 px-3 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        <span class="ml-2">Facebook</span>
                    </button>
                </div>
            </div>

            <!-- Switch to Login -->
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">
                    Đã có tài khoản? 
                    <button onclick="switchToLogin()" class="font-medium text-blue-600 hover:text-blue-500">
                        Đăng nhập ngay
                    </button>
                </p>
            </div>
        </div>
    </div>
</div>
