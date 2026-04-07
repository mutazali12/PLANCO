<?php
session_start();
include '../includes/config.php';

// التحقق من صلاحيات الدخول
if(!isset($_SESSION['user_role']) || !in_array($_SESSION['user_role'], ['admin','editor'])) {
    header('Location: ../login.php');
    exit;
}

// جلب الإحصائيات
$totalOrders = $pdo->query("SELECT COUNT(*) FROM orders")->fetchColumn();
$totalProducts = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
$totalCategories = $pdo->query("SELECT COUNT(*) FROM categories")->fetchColumn();
$totalStoreRequests = $pdo->query("SELECT COUNT(*) FROM store_requests")->fetchColumn();
$pendingRequests = $pdo->query("SELECT COUNT(*) FROM store_requests WHERE status = 'pending'")->fetchColumn();
$processingRequests = $pdo->query("SELECT COUNT(*) FROM store_requests WHERE status = 'processing'")->fetchColumn();
$completedRequests = $pdo->query("SELECT COUNT(*) FROM store_requests WHERE status = 'completed'")->fetchColumn();

// جلب آخر 5 طلبات متاجر
$recentRequests = $pdo->query("SELECT sr.*, u.username FROM store_requests sr JOIN users u ON sr.user_id = u.id ORDER BY sr.id DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم متجري</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%);
        }
        .stat-card {
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .sidebar-link {
            transition: all 0.2s;
        }
        .sidebar-link:hover {
            background: rgba(59,130,246,0.1);
            transform: translateX(-5px);
        }
    </style>
</head>
<body class="font-sans">

<div class="flex min-h-screen">
    <!-- القائمة الجانبية (سايد بار) -->
    <aside class="w-80 bg-white shadow-2xl fixed h-full overflow-y-auto z-10">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center shadow-md">
                    <i class="fas fa-store text-white text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">لوحة متجري</h1>
                    <p class="text-sm text-gray-500">مرحباً، <?php echo htmlspecialchars($_SESSION['username'] ?? 'مدير'); ?></p>
                </div>
            </div>
        </div>
        <nav class="p-4 space-y-2">
            <a href="index.php" class="sidebar-link flex items-center gap-4 p-4 rounded-2xl bg-blue-50 text-blue-700 font-semibold">
                <i class="fas fa-tachometer-alt text-xl w-6"></i> نظرة عامة
            </a>
            <a href="orders.php" class="sidebar-link flex items-center gap-4 p-4 rounded-2xl text-gray-700 hover:bg-gray-100">
                <i class="fas fa-truck text-xl w-6"></i> الطلبات
            </a>
            <a href="products_list.php" class="sidebar-link flex items-center gap-4 p-4 rounded-2xl text-gray-700 hover:bg-gray-100">
                <i class="fas fa-boxes text-xl w-6"></i> المنتجات
            </a>
            <a href="add_product.php" class="sidebar-link flex items-center gap-4 p-4 rounded-2xl text-gray-700 hover:bg-gray-100">
                <i class="fas fa-plus-circle text-xl w-6"></i> إضافة منتج
            </a>
            <a href="manage_categories.php" class="sidebar-link flex items-center gap-4 p-4 rounded-2xl text-gray-700 hover:bg-gray-100">
                <i class="fas fa-tags text-xl w-6"></i> التصنيفات
            </a>
            <a href="add_category.php" class="sidebar-link flex items-center gap-4 p-4 rounded-2xl text-gray-700 hover:bg-gray-100">
                <i class="fas fa-plus text-xl w-6"></i> تصنيف جديد
            </a>
            <a href="overview.php" class="sidebar-link flex items-center gap-4 p-4 rounded-2xl text-gray-700 hover:bg-gray-100">
                <i class="fas fa-store text-xl w-6"></i> طلبات المتاجر
            </a>
            <hr class="my-4">
            <a href="../logout.php" class="sidebar-link flex items-center gap-4 p-4 rounded-2xl text-red-600 hover:bg-red-50">
                <i class="fas fa-sign-out-alt text-xl w-6"></i> تسجيل الخروج
            </a>
        </nav>
    </aside>

    <!-- المحتوى الرئيسي -->
    <main class="flex-1 mr-80 p-8">
        <div class="max-w-7xl mx-auto">
            <!-- العنوان -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-gray-800">لوحة التحكم</h1>
                <p class="text-gray-500 mt-1">مرحباً بك في لوحة إدارة متجرك الإلكتروني</p>
            </div>

            <!-- بطاقات الإحصائيات -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <div class="stat-card bg-white rounded-3xl shadow-lg p-6 border-r-8 border-blue-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">إجمالي الطلبات</p>
                            <p class="text-4xl font-bold text-gray-800"><?php echo number_format($totalOrders); ?></p>
                        </div>
                        <i class="fas fa-shopping-cart text-5xl text-blue-200"></i>
                    </div>
                    <a href="orders.php" class="text-blue-600 text-sm mt-4 inline-block">عرض التفاصيل →</a>
                </div>
                <div class="stat-card bg-white rounded-3xl shadow-lg p-6 border-r-8 border-emerald-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">المنتجات</p>
                            <p class="text-4xl font-bold text-gray-800"><?php echo number_format($totalProducts); ?></p>
                        </div>
                        <i class="fas fa-boxes text-5xl text-emerald-200"></i>
                    </div>
                    <a href="products_list.php" class="text-emerald-600 text-sm mt-4 inline-block">إدارة المنتجات →</a>
                </div>
                <div class="stat-card bg-white rounded-3xl shadow-lg p-6 border-r-8 border-purple-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">التصنيفات</p>
                            <p class="text-4xl font-bold text-gray-800"><?php echo number_format($totalCategories); ?></p>
                        </div>
                        <i class="fas fa-tags text-5xl text-purple-200"></i>
                    </div>
                    <a href="manage_categories.php" class="text-purple-600 text-sm mt-4 inline-block">إدارة التصنيفات →</a>
                </div>
                <div class="stat-card bg-white rounded-3xl shadow-lg p-6 border-r-8 border-amber-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">طلبات المتاجر</p>
                            <p class="text-4xl font-bold text-gray-800"><?php echo number_format($totalStoreRequests); ?></p>
                        </div>
                        <i class="fas fa-store text-5xl text-amber-200"></i>
                    </div>
                    <a href="overview.php" class="text-amber-600 text-sm mt-4 inline-block">إدارة الطلبات →</a>
                </div>
            </div>

            <!-- حالة طلبات المتاجر -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-12">
                <div class="bg-white rounded-3xl shadow-lg p-6 text-center">
                    <i class="fas fa-clock text-yellow-500 text-4xl mb-3"></i>
                    <h3 class="text-xl font-bold">قيد الانتظار</h3>
                    <p class="text-3xl font-bold text-yellow-600 mt-2"><?php echo $pendingRequests; ?></p>
                </div>
                <div class="bg-white rounded-3xl shadow-lg p-6 text-center">
                    <i class="fas fa-spinner fa-pulse text-blue-500 text-4xl mb-3"></i>
                    <h3 class="text-xl font-bold">قيد المراجعة</h3>
                    <p class="text-3xl font-bold text-blue-600 mt-2"><?php echo $processingRequests; ?></p>
                </div>
                <div class="bg-white rounded-3xl shadow-lg p-6 text-center">
                    <i class="fas fa-check-circle text-green-500 text-4xl mb-3"></i>
                    <h3 class="text-xl font-bold">تم الإنجاز</h3>
                    <p class="text-3xl font-bold text-green-600 mt-2"><?php echo $completedRequests; ?></p>
                </div>
            </div>

            <!-- آخر طلبات المتاجر -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-600 to-blue-600 px-6 py-4 text-white flex justify-between items-center">
                    <h2 class="text-2xl font-bold">آخر طلبات إنشاء المتاجر</h2>
                    <a href="overview.php" class="text-white underline text-sm">عرض الكل</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-4 text-right">#</th>
                                <th class="p-4 text-right">المستخدم</th>
                                <th class="p-4 text-right">اسم المتجر</th>
                                <th class="p-4 text-right">السعة</th>
                                <th class="p-4 text-right">التكلفة</th>
                                <th class="p-4 text-right">الحالة</th>
                                <th class="p-4 text-right">التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($recentRequests)): ?>
                                <tr><td colspan="7" class="text-center p-8 text-gray-400">لا توجد طلبات بعد</td></tr>
                            <?php else: ?>
                                <?php foreach ($recentRequests as $req): ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-4"><?php echo $req['id']; ?></td>
                                    <td class="p-4"><?php echo htmlspecialchars($req['username']); ?></td>
                                    <td class="p-4"><?php echo htmlspecialchars($req['store_name']); ?></td>
                                    <td class="p-4"><?php echo $req['storage_size']; ?> GB</td>
                                    <td class="p-4"><?php echo number_format($req['storage_cost'], 2); ?> ج.س</td>
                                    <td class="p-4">
                                        <?php
                                        $badge = '';
                                        if ($req['status'] == 'pending') $badge = 'bg-yellow-100 text-yellow-800';
                                        elseif ($req['status'] == 'processing') $badge = 'bg-blue-100 text-blue-800';
                                        else $badge = 'bg-green-100 text-green-800';
                                        ?>
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold <?php echo $badge; ?>">
                                            <?php echo $req['status'] == 'pending' ? 'قيد الانتظار' : ($req['status'] == 'processing' ? 'قيد المراجعة' : 'تم الإنجاز'); ?>
                                        </span>
                                    </td>
                                    <td class="p-4"><?php echo date('Y-m-d', strtotime($req['created_at'])); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>
