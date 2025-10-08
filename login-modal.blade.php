<!-- Login Modal -->
<div id="loginModal" class="fixed inset-0 bg-transparent hidden z-50 flex items-start justify-end p-4 pt-20">
    <div class="bg-white rounded-lg modal-content shadow-2xl w-full max-w-sm transform transition-all duration-300 scale-95 opacity-0" id="loginModalContent">
        <!-- Modal Header -->
        <div class="relative p-4 border-b border-gray-200">
            <h2 class="text-lg text-gray-800 text-center">Đăng nhập</h2>
            <button onclick="closeLoginModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6">
            <form id="loginForm" class="space-y-4" method="POST" action="{{ url('/login') }}">
                @csrf
                
                <!-- Email/Phone -->
                <div>
                    <label for="login_email" class="block text-sm font-medium text-gray-700 mb-2">
                        Số điện thoại/Email
                    </label>
                    <input id="login_email" 
                           name="email" 
                           type="text" 
                           autocomplete="email" 
                           required 
                           value="{{ old('email') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
                           placeholder="Nhập số điện thoại hoặc email">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="login_password" class="block text-sm font-medium text-gray-700 mb-2">
                        Mật khẩu
                    </label>
                    <div class="relative">
                        <input id="login_password" 
                               name="password" 
                               type="password" 
                               autocomplete="current-password" 
                               required
                               class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password') border-red-500 @enderror"
                               placeholder="Nhập mật khẩu">
                        <button type="button" onclick="togglePassword('login_password')" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-blue-600 hover:text-blue-800 text-sm font-medium">
                            Hiện
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Forgot Password & Register Link -->
                <div class="flex items-center justify-between">
                    <button type="button" onclick="switchToRegister()" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                        Đăng ký ngay
                    </button>
                    <a href="#" class="text-sm text-red-600 hover:text-red-800 font-medium">
                        Quên mật khẩu?
                    </a>
                </div>

                <!-- Submit Buttons -->
                <div class="space-y-3">
                    <button type="submit" 
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                        Đăng nhập
                    </button>
                    <button type="button" onclick="closeLoginModal()" 
                            class="w-full flex justify-center py-3 px-4 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                        Bỏ qua
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
