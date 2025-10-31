<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Pesantren Pusat'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'Website resmi Pesantren Pusat.'); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>     
    
    <style>
        body { font-family: 'Manrope', sans-serif; background-color: #F9FAFB; }
        .text-primary-blue { color: #2563EB; }
        .bg-primary-blue { background-color: #2563EB; }
        .hover:bg-primary-blue-dark:hover { background-color: #1D4ED8; }
        .active-nav-link { color: #2563EB; position: relative; }
        .active-nav-link::after { content: ''; display: block; width: 6px; height: 6px; background-color: #2563EB; border-radius: 50%; position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); }
        .prose h1, .prose h2, .prose h3 { font-weight: 800; color: #111827; }
        .prose p { font-size: 1.125rem; line-height: 1.75; color: #374151; }
        .prose ul > li::before { background-color: #2563EB; }
        .prose a { color: #2563EB; }
        [x-cloak] { display: none !important; }

        .animasi-scroll {
            opacity: 0;
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .animasi-scroll.fade-in-up {
            transform: translateY(50px);
        }
        .animasi-scroll.fade-in-left {
            transform: translateX(-50px);
        }
        .animasi-scroll.fade-in-right {
            transform: translateX(50px);
        }
        .animasi-scroll.zoom-in {
            transform: scale(0.9);
        }
        .animasi-scroll.sudah-muncul {
            opacity: 1;
            transform: translateY(0) translateX(0) scale(1);
        }
        html, body {
            scrollbar-width: none; /* Untuk Firefox */
            -ms-overflow-style: none; /* Untuk IE dan Edge */
        }
        html::-webkit-scrollbar, body::-webkit-scrollbar {
            display: none; /* Untuk Chrome, Safari, dan Opera */
        }
        .hide-scrollbar {
            scrollbar-width: none; /* Untuk Firefox */
            -ms-overflow-style: none; /* Untuk IE dan Edge */
        }
        .hide-scrollbar::-webkit-scrollbar {
            display: none; /* Untuk Chrome, Safari, dan Opera */
        }
    </style>
</head>
<body class="text-gray-800">

    <?php echo $__env->make('layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main data-turbo-permanent id="main-content">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\laragon\www\ekosistem-pesantren\resources\views/layouts/app.blade.php ENDPATH**/ ?>