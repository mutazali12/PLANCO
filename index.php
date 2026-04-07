<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLANCO | صيانة الآليات الثقيلة</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Tajawal', system-ui, sans-serif; }
        .hero-bg {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('assets/images/hero.jpg') center/cover no-repeat;
            min-height: 100vh;
        }
        .sidebar { transform: translateX(100%); transition: transform 0.3s ease; }
        .sidebar-active { transform: translateX(0); }
    </style>
</head>
<body class="antialiased">

<!-- Header -->
<header class="fixed top-0 left-0 right-0 bg-white/95 backdrop-blur-md border-b z-50">
    <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <button onclick="toggleSidebar()" class="p-3 hover:bg-gray-100 rounded-2xl">
                <i class="fa-solid fa-bars-staggered text-2xl"></i>
            </button>
            <img src="assets/images/logo.png" alt="PLANCO" class="h-10">
        </div>
        <div class="flex gap-3">
            <a href="https://wa.me/201118901644" target="_blank" class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-2xl flex items-center gap-2 text-sm font-medium">
                <i class="fab fa-whatsapp"></i> مصعب
            </a>
            <a href="https://wa.me/201122394912" target="_blank" class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-2xl flex items-center gap-2 text-sm font-medium">
                <i class="fab fa-whatsapp"></i> معتز
            </a>
        </div>
    </div>
</header>

<!-- Sidebar -->
<div id="overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/50 z-50 hidden"></div>
<aside id="sidebar" class="sidebar fixed top-0 bottom-0 right-0 w-80 bg-white shadow-2xl z-[60] flex flex-col">
    <div class="p-6 border-b flex justify-between">
        <h2 class="text-2xl font-bold text-blue-700">PLANCO</h2>
        <button onclick="toggleSidebar()" class="text-3xl">✕</button>
    </div>
    <div class="flex-1 p-6 space-y-6 text-lg">
        <a href="index.html" class="block py-2 hover:text-blue-600">🏠 الرئيسية</a>
        <a href="about.html" class="block py-2 hover:text-blue-600">👷 عن بلانكو</a>
        <div class="pt-6 border-t">
            <p class="text-xs uppercase tracking-widest text-gray-500 mb-4">تخصصاتنا</p>
            <a href="#" class="block py-3 hover:text-blue-600">• صيانة الروافع والرافعات الشوكية</a>
            <a href="#" class="block py-3 hover:text-blue-600">• صيانة مولدات الديزل</a>
            <a href="#" class="block py-3 hover:text-blue-600">• تصنيع المنظومات الهيدروليكية</a>
            <a href="#" class="block py-3 hover:text-blue-600">• الفحص الحاسوبي والبرمجيات</a>
        </div>
    </div>
</aside>

<!-- Hero -->
<div class="hero-bg text-white flex items-center pt-16">
    <div class="max-w-2xl px-6">
        <h1 class="text-5xl md:text-6xl font-black leading-none mb-6">PLANCO</h1>
        <p class="text-2xl font-light mb-10">صيانة الآليات الثقيلة بتقنية عالية وخبرة سودانية محترفة</p>
        <div class="flex flex-wrap gap-4">
            <a href="https://wa.me/201118901644" target="_blank" class="bg-green-500 hover:bg-green-600 px-8 py-4 rounded-3xl flex items-center gap-3 font-medium">
                <i class="fab fa-whatsapp text-3xl"></i> م/ مصعب
            </a>
            <a href="https://wa.me/201122394912" target="_blank" class="bg-green-500 hover:bg-green-600 px-8 py-4 rounded-3xl flex items-center gap-3 font-medium">
                <i class="fab fa-whatsapp text-3xl"></i> م/ معتز
            </a>
        </div>
    </div>
</div>

<!-- Services -->
<section class="py-16 px-6 bg-gray-50">
    <h2 class="text-3xl font-bold text-center mb-12">خدماتنا المتخصصة</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
        <div class="bg-white p-8 rounded-3xl shadow">
            <div class="text-5xl mb-6">🏗️</div>
            <h3 class="text-2xl font-semibold mb-3">صيانة الروافع والرافعات الشوكية</h3>
            <p class="text-gray-600">جميع الماركات: Caterpillar, Toyota, Komatsu, Hyundai وغيرها</p>
        </div>
        <div class="bg-white p-8 rounded-3xl shadow">
            <div class="text-5xl mb-6">⚡</div>
            <h3 class="text-2xl font-semibold mb-3">صيانة مولدات الديزل</h3>
            <p class="text-gray-600">من 5 كيلو واط حتى 2000 كيلو واط - فحص وإصلاح شامل</p>
        </div>
        <div class="bg-white p-8 rounded-3xl shadow">
            <div class="text-5xl mb-6">🔧</div>
            <h3 class="text-2xl font-semibold mb-3">تصنيع منظومات هيدروليك كهربائية</h3>
            <p class="text-gray-600">حسب الطلب وبقدرات مختلفة حسب احتياج العميل</p>
        </div>
        <div class="bg-white p-8 rounded-3xl shadow">
            <div class="text-5xl mb-6">💻</div>
            <h3 class="text-2xl font-semibold mb-3">الفحص الحاسوبي والسكي</h3>
            <p class="text-gray-600">أجهزة تشخيص حديثة + برمجة وتحليل الأنظمة</p>
        </div>
    </div>
</section>

<!-- Footer Mobile -->
<footer class="fixed bottom-0 left-0 right-0 bg-white border-t z-50 md:hidden">
    <div class="grid grid-cols-5 text-center py-3 text-xs">
        <a href="index.html" class="flex flex-col items-center text-blue-600">
            <i class="fas fa-home text-2xl"></i><span class="mt-1">الرئيسية</span>
        </a>
        <a href="about.html" class="flex flex-col items-center text-gray-600">
            <i class="fas fa-info-circle text-2xl"></i><span class="mt-1">عن بلانكو</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-600">
            <i class="fas fa-tools text-2xl"></i><span class="mt-1">خدمات</span>
        </a>
        <a href="https://wa.me/201118901644" target="_blank" class="flex flex-col items-center text-green-600">
            <i class="fab fa-whatsapp text-2xl"></i><span class="mt-1">واتساب</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-600">
            <i class="fas fa-phone text-2xl"></i><span class="mt-1">اتصل</span>
        </a>
    </div>
</footer>

<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('sidebar-active');
    document.getElementById('overlay').classList.toggle('hidden');
}
</script>
</body>
</html>
