<!-- Auth Modal Component -->
<div id="auth-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="flex justify-between items-center p-6 border-b">
            <h2 id="modal-title" class="text-xl font-semibold text-gray-900">Đăng nhập</h2>
            <button onclick="closeAuthModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6">
            <!-- Tab Buttons -->
            <div class="flex mb-6 bg-gray-100 rounded-lg p-1">
                <button id="login-tab" onclick="switchTab('login')" class="flex-1 py-2 px-4 text-sm font-medium rounded-md transition-colors bg-white text-blue-600 shadow-sm">
                    Đăng nhập
                </button>
                <button id="register-tab" onclick="switchTab('register')" class="flex-1 py-2 px-4 text-sm font-medium rounded-md transition-colors text-gray-600 hover:text-gray-900">
                    Đăng ký
                </button>
            </div>

            <!-- Login Form -->
            <form id="login-form" class="space-y-4" method="POST" action="{{ route('auth.login.post') }}">
                @csrf
                <div>
                    <label for="login-email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="login-email" name="email" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label for="login-password" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu</label>
                    <input type="password" id="login-password" name="password" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Ghi nhớ đăng nhập</span>
                    </label>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                    Đăng nhập
                </button>
            </form>

            <!-- Register Form -->
            <form id="register-form" class="space-y-4 hidden" method="POST" action="{{ route('auth.register.post') }}">
                @csrf
                <div>
                    <label for="register-full-name" class="block text-sm font-medium text-gray-700 mb-1">Họ và tên</label>
                    <input type="text" id="register-full-name" name="full_name" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label for="register-email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="register-email" name="email" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label for="register-phone" class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại</label>
                    <input type="tel" id="register-phone" name="phone" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label for="register-password" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu</label>
                    <input type="password" id="register-password" name="password" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label for="register-password-confirmation" class="block text-sm font-medium text-gray-700 mb-1">Xác nhận mật khẩu</label>
                    <input type="password" id="register-password-confirmation" name="password_confirmation" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label for="register-driver-license" class="block text-sm font-medium text-gray-700 mb-1">Số bằng lái xe (tùy chọn)</label>
                    <input type="text" id="register-driver-license" name="driver_license_no" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label for="register-address" class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ (tùy chọn)</label>
                    <textarea id="register-address" name="address" rows="2" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                    Đăng ký
                </button>
            </form>

            <!-- Error/Success Messages -->
            <div id="auth-message" class="mt-4 hidden">
                <div id="auth-message-content" class="p-3 rounded-md"></div>
            </div>
        </div>
    </div>
</div>

<!-- Auth Modal JavaScript -->
<script>
// Auth Modal Functions
function openAuthModal(type) {
    const modal = document.getElementById('auth-modal');
    const title = document.getElementById('modal-title');
    
    if (type === 'login') {
        title.textContent = 'Đăng nhập';
        switchTab('login');
    } else {
        title.textContent = 'Đăng ký';
        switchTab('register');
    }
    
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeAuthModal() {
    const modal = document.getElementById('auth-modal');
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
    clearAuthMessage();
}

function switchTab(type) {
    const loginTab = document.getElementById('login-tab');
    const registerTab = document.getElementById('register-tab');
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    
    if (type === 'login') {
        loginTab.classList.add('bg-white', 'text-blue-600', 'shadow-sm');
        loginTab.classList.remove('text-gray-600', 'hover:text-gray-900');
        registerTab.classList.remove('bg-white', 'text-blue-600', 'shadow-sm');
        registerTab.classList.add('text-gray-600', 'hover:text-gray-900');
        loginForm.classList.remove('hidden');
        registerForm.classList.add('hidden');
    } else {
        registerTab.classList.add('bg-white', 'text-blue-600', 'shadow-sm');
        registerTab.classList.remove('text-gray-600', 'hover:text-gray-900');
        loginTab.classList.remove('bg-white', 'text-blue-600', 'shadow-sm');
        loginTab.classList.add('text-gray-600', 'hover:text-gray-900');
        registerForm.classList.remove('hidden');
        loginForm.classList.add('hidden');
    }
    clearAuthMessage();
}

function showAuthMessage(message, type = 'error') {
    const messageDiv = document.getElementById('auth-message');
    const messageContent = document.getElementById('auth-message-content');
    
    messageContent.textContent = message;
    messageContent.className = `p-3 rounded-md ${type === 'error' ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700'}`;
    messageDiv.classList.remove('hidden');
}

function clearAuthMessage() {
    const messageDiv = document.getElementById('auth-message');
    messageDiv.classList.add('hidden');
}

// Login Form Handler
document.getElementById('login-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    try {
        const response = await fetch('{{ route("auth.login.post") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            showAuthMessage(result.message, 'success');
            setTimeout(() => {
                closeAuthModal();
                // Reload page to show logged in state
                window.location.reload();
            }, 1500);
        } else {
            showAuthMessage(result.message || 'Đăng nhập thất bại');
        }
    } catch (error) {
        console.error('Login error:', error);
        // Check if response is HTML (redirect) instead of JSON
        if (response.redirected || response.url !== '{{ route("auth.login.post") }}') {
            // Success - page was redirected, reload to show logged in state
            window.location.reload();
        } else {
            showAuthMessage('Có lỗi xảy ra. Vui lòng thử lại.');
        }
    }
});

// Register Form Handler
document.getElementById('register-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    try {
        const response = await fetch('{{ route("auth.register.post") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        });
        
        console.log('Response status:', response.status);
        console.log('Response headers:', response.headers);
        
        const result = await response.json();
        console.log('Register response:', result);
        
        if (result.success) {
            console.log('Registration successful, showing message...');
            showAuthMessage(result.message, 'success');
            setTimeout(() => {
                console.log('Closing modal and reloading page...');
                closeAuthModal();
                // Reload page to show logged in state
                window.location.reload();
            }, 1500);
        } else {
            if (result.errors) {
                const errorMessages = Object.values(result.errors).flat().join(', ');
                showAuthMessage(errorMessages);
            } else {
                showAuthMessage(result.message || 'Đăng ký thất bại');
            }
        }
    } catch (error) {
        console.error('Register error:', error);
        // Check if response is HTML (redirect) instead of JSON
        if (response.redirected || response.url !== '{{ route("auth.register.post") }}') {
            // Success - page was redirected, reload to show logged in state
            window.location.reload();
        } else {
            showAuthMessage('Có lỗi xảy ra. Vui lòng thử lại.');
        }
    }
});

// Logout Function
async function logout() {
    try {
        const response = await fetch('{{ route("auth.logout") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });
        
        const result = await response.json();
        
        if (result.success) {
            updateUserInterface(null);
            // Redirect to home page after logout
            window.location.href = '/';
        }
    } catch (error) {
        console.error('Logout error:', error);
    }
}

// Update User Interface
function updateUserInterface(user) {
    const authButtons = document.getElementById('auth-buttons');
    const userMenu = document.getElementById('user-menu');
    const userName = document.getElementById('user-name');
    const userInitial = document.getElementById('user-initial');
    
    if (user) {
        authButtons.classList.add('hidden');
        userMenu.classList.remove('hidden');
        userName.textContent = user.name;
        userInitial.textContent = user.name.charAt(0).toUpperCase();
    } else {
        authButtons.classList.remove('hidden');
        userMenu.classList.add('hidden');
    }
}

// Check Authentication Status on Page Load
async function checkAuthStatus() {
    try {
        const response = await fetch('{{ route("auth.check") }}');
        const result = await response.json();
        
        if (result.authenticated) {
            updateUserInterface(result.user);
        }
    } catch (error) {
        console.error('Auth check error:', error);
    }
}

// Initialize auth status check
document.addEventListener('DOMContentLoaded', checkAuthStatus);

// Close modal when clicking outside
document.getElementById('auth-modal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeAuthModal();
    }
});
</script>
