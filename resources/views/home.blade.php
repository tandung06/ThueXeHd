@extends('layouts.app')

@section('title', 'Thuê Xe HD - Dịch vụ cho thuê xe uy tín')
@section('description', 'Thuê Xe HD cung cấp dịch vụ cho thuê xe chất lượng cao với giá cả hợp lý. Xe đời mới, tài xế chuyên nghiệp, phục vụ 24/7.')

@section('content')
<!-- Hero Section -->
<section class="hero-gradient text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Thuê Xe HD
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100">
                Dịch vụ cho thuê xe chuyên nghiệp, uy tín và chất lượng cao
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('booking') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    Đặt xe ngay
                </a>
                <a href="{{ route('services') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                    Xem dịch vụ
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Tại sao chọn Thuê Xe HD?
            </h2>
            <p class="text-xl text-gray-600">
                Chúng tôi cam kết mang đến dịch vụ tốt nhất cho khách hàng
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Xe đời mới</h3>
                <p class="text-gray-600">Đội xe được cập nhật thường xuyên với các dòng xe hiện đại, đảm bảo an toàn và tiện nghi.</p>
            </div>
            
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Tài xế chuyên nghiệp</h3>
                <p class="text-gray-600">Đội ngũ tài xế giàu kinh nghiệm, được đào tạo chuyên nghiệp và có thái độ phục vụ tốt.</p>
            </div>
            
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Phục vụ 24/7</h3>
                <p class="text-gray-600">Dịch vụ hoạt động 24/7, sẵn sàng phục vụ khách hàng mọi lúc, mọi nơi.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Dịch vụ của chúng tôi
            </h2>
            <p class="text-xl text-gray-600">
                Đa dạng các loại hình dịch vụ cho thuê xe phù hợp với mọi nhu cầu
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <div class="h-48 bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-3">Thuê xe du lịch</h3>
                    <p class="text-gray-600 mb-4">Dịch vụ cho thuê xe phục vụ các chuyến du lịch, tham quan với giá cả hợp lý.</p>
                    <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Tìm hiểu thêm →</a>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <div class="h-48 bg-gradient-to-r from-pink-500 to-red-600 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-3">Thuê xe cưới hỏi</h3>
                    <p class="text-gray-600 mb-4">Xe cưới sang trọng, đẹp mắt phục vụ ngày trọng đại của bạn.</p>
                    <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Tìm hiểu thêm →</a>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                <div class="h-48 bg-gradient-to-r from-green-500 to-teal-600 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-3">Thuê xe sân bay</h3>
                    <p class="text-gray-600 mb-4">Dịch vụ đưa đón sân bay chuyên nghiệp, đúng giờ và an toàn.</p>
                    <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Tìm hiểu thêm →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-blue-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            Sẵn sàng đặt xe?
        </h2>
        <p class="text-xl text-blue-100 mb-8">
            Liên hệ ngay với chúng tôi để được tư vấn và đặt xe
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:19001234" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                📞 Gọi ngay: 1900 1234
            </a>
            <a href="{{ route('booking') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                Đặt xe online
            </a>
        </div>
    </div>
</section>
@endsection
