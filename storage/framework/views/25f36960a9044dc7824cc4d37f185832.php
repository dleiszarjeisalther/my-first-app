
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-50 lg:flex">
            <?php if (isset($component)) { $__componentOriginala12ee38770dfc9ba212665cdb25e4cfd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala12ee38770dfc9ba212665cdb25e4cfd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala12ee38770dfc9ba212665cdb25e4cfd)): ?>
<?php $attributes = $__attributesOriginala12ee38770dfc9ba212665cdb25e4cfd; ?>
<?php unset($__attributesOriginala12ee38770dfc9ba212665cdb25e4cfd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala12ee38770dfc9ba212665cdb25e4cfd)): ?>
<?php $component = $__componentOriginala12ee38770dfc9ba212665cdb25e4cfd; ?>
<?php unset($__componentOriginala12ee38770dfc9ba212665cdb25e4cfd); ?>
<?php endif; ?>

            <!-- Page Content -->
            <div class="flex-1 flex flex-col min-w-0">
                <!-- Page Heading -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($header)): ?>
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            <?php echo e($header); ?>

                        </div>
                    </header>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <!-- Page Content -->
                <main class="flex-1 p-6">
                    <?php echo e($slot); ?>

                </main>
            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\Users\universal\Herd\my-first-app\resources\views/layouts/newapp.blade.php ENDPATH**/ ?>