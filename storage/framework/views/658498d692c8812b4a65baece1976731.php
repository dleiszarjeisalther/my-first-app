
<!-- Start: HTML Document -->
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <!-- Start: Document Head -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Start: Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- End: Fonts -->

        <!-- Start: Styles / Scripts -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot'))): ?>
            <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
        <?php else: ?>
            <style>
                /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */
                body { font-family: 'Figtree', sans-serif; }
            </style>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <!-- End: Styles / Scripts -->
    </head>
    <!-- End: Document Head -->

    <!-- Start: Document Body -->
    <body class="antialiased font-sans">
        <!-- Start: Page Background Container -->
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <!-- Start: Background Decoration -->
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
            <!-- End: Background Decoration -->

            <!-- Start: Main Layout Wrapper -->
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <!-- Start: Content Container -->
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <!-- Start: Header Section -->
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <!-- Start: Laravel Hero Logo -->
                        <div class="flex lg:justify-center lg:col-start-2">
                            <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5618C61.8898 28.737 61.8434 28.9092 61.7554 29.0605C61.6674 29.2118 61.5409 29.3368 61.3896 29.4221L30.723 47.0321C30.5746 47.1173 30.4074 47.1622 30.237 47.1622C30.0665 47.1622 29.8993 47.1173 29.751 47.0321L1.62192 31.0251C1.47065 30.9398 1.34415 30.8148 1.25618 30.6635C1.16821 30.5122 1.12176 30.34 1.12188 30.1648V16.4888C1.12185 16.2908 1.18181 16.0975 1.29413 15.9333C1.40645 15.769 1.56631 15.641 1.75354 15.5651L1.92131 15.4981L11.5113 11.6621C11.6917 11.5898 11.8906 11.5749 12.0801 11.6193C12.2696 11.6637 12.4411 11.7654 12.5705 11.9103L22.9554 23.4491L29.751 19.5441V2.61605C29.751 2.44084 29.7974 2.26862 29.8854 2.11731C29.9734 1.966 30.0999 1.84103 30.2512 1.7557L31.5401 1.01542C31.6885 0.930193 31.8557 0.885254 32.0261 0.885254C32.1966 0.885254 32.3637 0.930193 32.5122 1.01542L61.2754 17.5451C61.5434 17.6989 61.7371 17.9525 61.8157 18.2526L61.8548 18.4231V14.6253Z" fill="currentColor"/>
                                <path d="M29.751 47.0321L29.751 63.8548C29.751 64.03 29.7046 64.2022 29.6166 64.3535C29.5286 64.5048 29.4021 64.6298 29.2508 64.7151L27.9619 65.4554C27.8135 65.5406 27.6463 65.5856 27.4759 65.5856C27.3054 65.5856 27.1382 65.5406 26.9898 65.4554L1.12188 50.6048C0.853902 50.4511 0.660163 50.1974 0.581543 49.8973L0.54248 49.7268V31.0251L29.751 47.0321Z" fill="currentColor"/>
                            </svg>
                        </div>
                        <!-- End: Laravel Hero Logo -->

                        <!-- Start: Auth Navigation Menu -->
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Route::has('login')): ?>
                            <nav class="-mx-3 flex flex-1 justify-end">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                                    <!-- Start: Dashboard Link -->
                                    <a
                                        href="<?php echo e(url('/dashboard')); ?>"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                    <!-- End: Dashboard Link -->
                                <?php else: ?>
                                    <!-- Start: Login Link -->
                                    <a
                                        href="<?php echo e(route('login')); ?>"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>
                                    <!-- End: Login Link -->

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Route::has('register')): ?>
                                        <!-- Start: Register Link -->
                                        <a
                                            href="<?php echo e(route('register')); ?>"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                        <!-- End: Register Link -->
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </nav>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <!-- End: Auth Navigation Menu -->
                    </header>
                    <!-- End: Header Section -->

                    <!-- Start: Main Content Section -->
                    <main class="mt-6">
                        <!-- Start: Feature Cards Grid -->
                        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                            <!-- Start: Documentation Card -->
                            <a
                                href="https://laravel.com/docs"
                                id="docs-card"
                                class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-white"
                            >
                                <!-- Start: Documentation Icon -->
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="#FF2D20" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18c-2.305 0-4.408.867-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </div>
                                <!-- End: Documentation Icon -->

                                <!-- Start: Documentation Text Content -->
                                <div class="relative flex items-center gap-6 lg:items-start">
                                    <div id="docs-card-content" class="flex flex-col gap-4">
                                        <h2 class="text-xl font-semibold text-black dark:text-white">Documentation</h2>

                                        <p class="text-sm/relaxed">
                                            Laravel has wonderful documentation covering every aspect of the framework. Whether you are a newcomer or have prior experience with Laravel, we recommend reading our documentation from beginning to end.
                                        </p>
                                    </div>

                                    <!-- Start: Arrow Icon -->
                                    <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                    </svg>
                                    <!-- End: Arrow Icon -->
                                </div>
                                <!-- End: Documentation Text Content -->
                            </a>
                            <!-- End: Documentation Card -->

                            <!-- Start: Laracasts Card -->
                            <a
                                href="https://laracasts.com"
                                class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-white"
                            >
                                <!-- Start: Laracasts Icon -->
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="#FF2D20" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </div>
                                <!-- End: Laracasts Icon -->

                                <!-- Start: Laracasts Text Content -->
                                <div class="relative flex items-center gap-6 lg:items-start">
                                    <div class="flex flex-col gap-4">
                                        <h2 class="text-xl font-semibold text-black dark:text-white">Laracasts</h2>

                                        <p class="text-sm/relaxed">
                                            Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                        </p>
                                    </div>

                                    <!-- Start: Arrow Icon -->
                                    <svg class="size-6 shrink-0 self-center stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                    </svg>
                                    <!-- End: Arrow Icon -->
                                </div>
                                <!-- End: Laracasts Text Content -->
                            </a>
                            <!-- End: Laracasts Card -->

                            <!-- Start: Laravel News Card -->
                            <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800">
                                <!-- Start: Laravel News Icon -->
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="#FF2D20" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                    </svg>
                                </div>
                                <!-- End: Laravel News Icon -->

                                <!-- Start: Laravel News Text Content -->
                                <div class="flex flex-col gap-4">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">Laravel News</h2>

                                    <p class="text-sm/relaxed">
                                        Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                    </p>
                                </div>
                                <!-- End: Laravel News Text Content -->
                            </div>
                            <!-- End: Laravel News Card -->

                            <!-- Start: Vibrant Ecosystem Card -->
                            <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800">
                                <!-- Start: Ecosystem Icon -->
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FF2D20]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="#FF2D20" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253" />
                                    </svg>
                                </div>
                                <!-- End: Ecosystem Icon -->

                                <!-- Start: Ecosystem Text Content -->
                                <div class="flex flex-col gap-4">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">Vibrant Ecosystem</h2>

                                    <p class="text-sm/relaxed">
                                        Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                                    </p>
                                </div>
                                <!-- End: Ecosystem Text Content -->
                            </div>
                            <!-- End: Vibrant Ecosystem Card -->
                        </div>
                        <!-- End: Feature Cards Grid -->
                    </main>
                    <!-- End: Main Content Section -->

                    <!-- Start: Footer Section -->
                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v<?php echo e(Illuminate\Foundation\Application::VERSION); ?> (PHP v<?php echo e(PHP_VERSION); ?>)
                    </footer>
                    <!-- End: Footer Section -->
                </div>
                <!-- End: Content Container -->
            </div>
            <!-- End: Main Layout Wrapper -->
        </div>
        <!-- End: Page Background Container -->
    </body>
    <!-- End: Document Body -->
</html>
<!-- End: HTML Document -->
<?php /**PATH C:\Users\universal\Herd\my-first-app\resources\views/welcome.blade.php ENDPATH**/ ?>