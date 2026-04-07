<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
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
        .header-glass { background: rgba(255,255,255,0.97); backdrop-filter: blur(12px); }
        .sidebar-active { transform: translateX(0) !important; }
        .hero-bg { background: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url('assets/images/hero.jpg') center/cover no-repeat; }
    </style>
</head>
<body class="antialiased">
<header class="fixed top-0 left-0 right-0 z-50 header-glass border-b">
    <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <button onclick="toggleSidebar()" class="p-3 hover:bg-gray-100 rounded-2xl">
                <i class="fa-solid fa-bars-staggered text-2xl"></i>
            </button>
            <a href="index.php">
                <img src="assets/images/logo.png" alt="PLANCO" class="h-10 w-auto">
            </a>
        </div>
        <div class="flex items-center gap-4">
            <a href="https://wa.me/201118901644" target="_blank" class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-2xl text-sm font-medium">
                <i class="fab fa-whatsapp"></i> مصعب
            </a>
            <a href="https://wa.me/201122394912" target="_blank" class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-2xl text-sm font-medium">
                <i class="fab fa-whatsapp"></i> معتز
            </a>
        </div>
    </div>
</header>

<!-- Sidebar -->
<div onclick="if(event.target.id==='sidebar-overlay')toggleSidebar()" id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-[60] hidden"></div>
<aside id="sidebar" class="fixed top-0 bottom-0 right-0 w-80 bg-white shadow-2xl z-[70] translate-x-full transition-transform duration-300 flex flex-col">
    <div class="p-6 border-b flex justify-between items-center">
        <h2 class="text-2xl font-bold">PLANCO</h2>
        <button onclick="toggleSidebar()" class="text-3xl text-gray-400">✕</button>
    </div>
    <div class="flex-1 overflow-y-auto p-6 space-y-6">
        <a href="index.php" class="flex items-center gap-4 text-lg font-medium hover:text-blue-600">🏠 الرئيسية</a>
        <a href="about.php" class="flex items-center gap-4 text-lg font-medium hover:text-blue-600">👷 عن بلانكو</a>
        
        <div class="pt-6 border-t">
            <p class="uppercase text-xs tracking-widest text-gray-500 mb-4">تخصصاتنا</p>
            <a href="#cranes" class="block py-3 hover:text-blue-600">• صيانة الروافع والرافعات الشوكية</a>
            <a href="#forklifts" class="block py-3 hover:text-blue-600">• الروافع الشوكية</a>
            <a href="#generators" class="block py-3 hover:text-blue-600">• صيانة مولدات الديزل</a>
            <a href="#hydraulic" class="block py-3 hover:text-blue-600">• تصنيع وصيانة المنظومات الهيدروليكية</a>
            <a href="#diagnostic" class="block py-3 hover:text-blue-600">• الفحص الحاسوبي والبرمجيات</a>
        </div>
    </div>
    <div class="p-6 border-t text-center text-sm text-gray-500">
        مجموعة مهندسين سودانيين متخصصين
    </div>
</aside>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    sidebar.classList.toggle('translate-x-full');
    overlay.classList.toggle('hidden');
}
</script>
