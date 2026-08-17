
<!-- Start: HTML Document -->
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <!-- Start: Document Head -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Start: Fonts (Figtree from Bunny Fonts) -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- End: Fonts -->

        <!-- Start: Scripts & Styles (Vite) -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
        <!-- End: Scripts & Styles (Vite) -->
    </head>
    <!-- End: Document Head -->

    <!-- Start: Document Body -->
    <body class="font-sans antialiased">
        <!-- Start: Page Background Wrapper -->
        <div class="min-h-screen bg-gray-100">
            <!-- Start: Top Navigation Bar (Logo + Links + User Dropdown) -->
            <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <!-- End: Top Navigation Bar -->

            <!-- Start: Page Heading Banner (Rendered only if $header slot provided) -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($header)): ?>
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <?php echo e($header); ?>

                    </div>
                </header>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <!-- End: Page Heading Banner -->

            <!-- Start: Main Page Content Slot -->
            <main>
                <?php echo e($slot); ?>

            </main>
            <!-- End: Main Page Content Slot -->
        </div>
        <!-- End: Page Background Wrapper -->
    </body>
    <!-- End: Document Body -->
</html>
<!-- End: HTML Document -->
<?php /**PATH C:\Users\universal\Herd\my-first-app\resources\views/layouts/app.blade.php ENDPATH**/ ?>