<!-- Auth Popup Component - Compact version -->
<div id="auth-popup" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl max-w-sm w-full">
        <!-- Modal Header -->
        <div class="flex justify-between items-center p-4 border-b">
            <h2 id="popup-title" class="text-lg font-semibold text-gray-900">Đăng nhập</h2>
            <button onclick="closeAuthPopup()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-4">
            <!-- Tab Buttons -->
            <div class="flex mb-4 bg-gray-100 rounded-lg p-1">
                <button id="popup-login-tab" onclick="switchPopupTab('login')" class="flex-1 py-1 px-3 text-sm font-medium rounded-md transition-colors bg-white text-blue-600 shadow-sm">
                    Đăng nhập
                </button>
                <button id="popup-register-tab" onclick="switchPopupTab('register')" class="flex-1 py-1 px-3 text-sm font-medium rounded-md transition-colors text-gray-600 hover:text-gray-900">
                    Đăng ký
                </button>
            </div>

            <!-- Login Form -->
            <form id="popup-login-form" class="space-y-3">
                <div>
                    <input type="email" id="popup-login-email" name="email" required 
                           class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Email">
                </div>
                <div>
                    <input type="password" id="popup-login-password" name="password" required 
                           class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Mật khẩu">
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors text-sm">
                    Đăng nhập
                </button>
            </form>

            <!-- Register Form -->
            <form id="popup-register-form" class="space-y-3 hidden">
                <div>
                    <input type="text" id="popup-register-full-name" name="full_name" required 
                           class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Họ và tên">
                </div>
                <div>
                    <input type="email" id="popup-register-email" name="email" required 
                           class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Email">
                </div>
                <div>
                    <input type="password" id="popup-register-password" name="password" required 
                           class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Mật khẩu">
                </div>
                <div>
                    <input type="password" id="popup-register-password-confirmation" name="password_confirmation" required 
                           class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Xác nhận mật khẩu">
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors text-sm">
                    Đăng ký
                </button>
            </form>

            <!-- Error/Success Messages -->
            <div id="popup-auth-message" class="mt-3 hidden">
                <div id="popup-auth-message-content" class="p-2 rounded-md text-sm"></div>
            </div>
        </div>
    </div>
</div>

<!-- Auth Popup JavaScript -->
<script>
// Auth Popup Functions
function openAuthPopup(type) {
    const popup = document.getElementById('auth-popup');
    const title = document.getElementById('popup-title');
    
    if (type === 'login') {
        title.textContent = 'Đăng nhập';
        switchPopupTab('login');
    } else {
        title.textContent = 'Đăng ký';
        switchPopupTab('register');
    }
    
    popup.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeAuthPopup() {
    const popup = document.getElementById('auth-popup');
    popup.classList.add('hidden');
    document.body.style.overflow = 'auto';
    clearPopupAuthMessage();
}

function switchPopupTab(type) {
    const loginTab = document.getElementById('popup-login-tab');
    const registerTab = document.getElementById('popup-register-tab');
    const loginForm = document.getElementById('popup-login-form');
    const registerForm = document.getElementById('popup-register-form');
    
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
    clearPopupAuthMessage();
}

function showPopupAuthMessage(message, type = 'error') {
    const messageDiv = document.getElementById('popup-auth-message');
    const messageContent = document.getElementById('popup-auth-message-content');
    
    messageContent.textContent = message;
    messageContent.className = `p-2 rounded-md text-sm ${type === 'error' ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700'}`;
    messageDiv.classList.remove('hidden');
}

function clearPopupAuthMessage() {
    const messageDiv = document.getElementById('popup-auth-message');
    messageDiv.classList.add('hidden');
}

// Popup Login Form Handler
document.getElementById('popup-login-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const data = Object.fromEntries(formData);
    
    try {
        const response = await fetch('/auth/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        });
        
        const result = await response.json();
        
        if (result.success) {
            showPopupAuthMessage(result.message, 'success');
            setTimeout(() => {
                closeAuthPopup();
                updateUserInterface(result.user);
                window.location.reload();
            }, 1500);
        } else {
            showPopupAuthMessage(result.message || 'Đăng nhập thất bại');
        }
    } catch (error) {
        showPopupAuthMessage('Có lỗi xảy ra. Vui lòng thử lại 1.');
    }
});

// Popup Register Form Handler
document.getElementById('popup-register-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const data = Object.fromEntries(formData);
    
    try {
        const response = await fetch('/auth/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        });
        
        const result = await response.json();
        
        if (result.success) {
            showPopupAuthMessage(result.message, 'success');
            setTimeout(() => {
                closeAuthPopup();
                updateUserInterface(result.user);
                window.location.reload();
            }, 1500);
        } else {
            if (result.errors) {
                const errorMessages = Object.values(result.errors).flat().join(', ');
                showPopupAuthMessage(errorMessages);
            } else {
                showPopupAuthMessage(result.message || 'Đăng ký thất bại');
            }
        }
    } catch (error) {
        showPopupAuthMessage('Có lỗi xảy ra. Vui lòng thử lại. 5');
    }
});

// Close popup when clicking outside
document.getElementById('auth-popup').addEventListener('click', function(e) {
    if (e.target === this) {
        closeAuthPopup();
    }
});
</script>
