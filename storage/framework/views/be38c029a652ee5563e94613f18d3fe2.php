
<!-- Start: Navigation Bar -->
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Start: Primary Navigation Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Start: Left Navigation (Logo & Desktop Links) -->
            <div class="flex">
                <!-- Start: Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="<?php echo e(route('dashboard')); ?>">
                        <?php if (isset($component)) { $__componentOriginal8892e718f3d0d7a916180885c6f012e7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8892e718f3d0d7a916180885c6f012e7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.application-logo','data' => ['class' => 'block h-9 w-auto fill-current text-gray-800']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('application-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block h-9 w-auto fill-current text-gray-800']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8892e718f3d0d7a916180885c6f012e7)): ?>
<?php $attributes = $__attributesOriginal8892e718f3d0d7a916180885c6f012e7; ?>
<?php unset($__attributesOriginal8892e718f3d0d7a916180885c6f012e7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8892e718f3d0d7a916180885c6f012e7)): ?>
<?php $component = $__componentOriginal8892e718f3d0d7a916180885c6f012e7; ?>
<?php unset($__componentOriginal8892e718f3d0d7a916180885c6f012e7); ?>
<?php endif; ?>
                    </a>
                </div>
                <!-- End: Logo -->

                <!-- Start: Desktop Navigation Links (hidden on mobile) -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <?php if (isset($component)) { $__componentOriginalebeb7381c3d73aed03852254d0ae2adb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalebeb7381c3d73aed03852254d0ae2adb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.nav-link','data' => ['href' => route('dashboard'),'active' => request()->routeIs('dashboard')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav.nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('dashboard')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('dashboard'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        <?php echo e(__('Dashboard')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalebeb7381c3d73aed03852254d0ae2adb)): ?>
<?php $attributes = $__attributesOriginalebeb7381c3d73aed03852254d0ae2adb; ?>
<?php unset($__attributesOriginalebeb7381c3d73aed03852254d0ae2adb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalebeb7381c3d73aed03852254d0ae2adb)): ?>
<?php $component = $__componentOriginalebeb7381c3d73aed03852254d0ae2adb; ?>
<?php unset($__componentOriginalebeb7381c3d73aed03852254d0ae2adb); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalebeb7381c3d73aed03852254d0ae2adb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalebeb7381c3d73aed03852254d0ae2adb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.nav-link','data' => ['href' => route('skills.index'),'active' => request()->routeIs('skills.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav.nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('skills.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('skills.*'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        <?php echo e(__('Skills')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalebeb7381c3d73aed03852254d0ae2adb)): ?>
<?php $attributes = $__attributesOriginalebeb7381c3d73aed03852254d0ae2adb; ?>
<?php unset($__attributesOriginalebeb7381c3d73aed03852254d0ae2adb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalebeb7381c3d73aed03852254d0ae2adb)): ?>
<?php $component = $__componentOriginalebeb7381c3d73aed03852254d0ae2adb; ?>
<?php unset($__componentOriginalebeb7381c3d73aed03852254d0ae2adb); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalebeb7381c3d73aed03852254d0ae2adb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalebeb7381c3d73aed03852254d0ae2adb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.nav-link','data' => ['href' => route('category.index'),'active' => request()->routeIs('category.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav.nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('category.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('category.*'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        <?php echo e(__('Categories')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalebeb7381c3d73aed03852254d0ae2adb)): ?>
<?php $attributes = $__attributesOriginalebeb7381c3d73aed03852254d0ae2adb; ?>
<?php unset($__attributesOriginalebeb7381c3d73aed03852254d0ae2adb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalebeb7381c3d73aed03852254d0ae2adb)): ?>
<?php $component = $__componentOriginalebeb7381c3d73aed03852254d0ae2adb; ?>
<?php unset($__componentOriginalebeb7381c3d73aed03852254d0ae2adb); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalebeb7381c3d73aed03852254d0ae2adb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalebeb7381c3d73aed03852254d0ae2adb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.nav-link','data' => ['href' => route('tasks.index'),'active' => request()->routeIs('tasks.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav.nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('tasks.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('tasks.*'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        <?php echo e(__('Task')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalebeb7381c3d73aed03852254d0ae2adb)): ?>
<?php $attributes = $__attributesOriginalebeb7381c3d73aed03852254d0ae2adb; ?>
<?php unset($__attributesOriginalebeb7381c3d73aed03852254d0ae2adb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalebeb7381c3d73aed03852254d0ae2adb)): ?>
<?php $component = $__componentOriginalebeb7381c3d73aed03852254d0ae2adb; ?>
<?php unset($__componentOriginalebeb7381c3d73aed03852254d0ae2adb); ?>
<?php endif; ?>
                    <!-- Add more desktop links here -->
                </div>
                <!-- End: Desktop Navigation Links -->
            </div>
            <!-- End: Left Navigation -->

            <!-- Start: Settings Dropdown (hidden on mobile) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <?php if (isset($component)) { $__componentOriginaleea726fa4f84deb9f7684b50bdd6328c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleea726fa4f84deb9f7684b50bdd6328c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.dropdown','data' => ['align' => 'right','width' => '48']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right','width' => '48']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    <!-- Start: Dropdown Trigger -->
                     <?php $__env->slot('trigger', null, []); ?> 
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div><?php echo e(Auth::user()->name); ?></div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                     <?php $__env->endSlot(); ?>
                    <!-- End: Dropdown Trigger -->

                    <!-- Start: Dropdown Content -->
                     <?php $__env->slot('content', null, []); ?> 
                        <!-- Start: Profile Link -->
                        <?php if (isset($component)) { $__componentOriginalbac3423f24c62a1b80ce31a377ac7b66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbac3423f24c62a1b80ce31a377ac7b66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.dropdown-link','data' => ['href' => route('profile.edit')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('profile.edit'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                            <?php echo e(__('Profile')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbac3423f24c62a1b80ce31a377ac7b66)): ?>
<?php $attributes = $__attributesOriginalbac3423f24c62a1b80ce31a377ac7b66; ?>
<?php unset($__attributesOriginalbac3423f24c62a1b80ce31a377ac7b66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbac3423f24c62a1b80ce31a377ac7b66)): ?>
<?php $component = $__componentOriginalbac3423f24c62a1b80ce31a377ac7b66; ?>
<?php unset($__componentOriginalbac3423f24c62a1b80ce31a377ac7b66); ?>
<?php endif; ?>
                        <!-- End: Profile Link -->

                        <!-- Start: Logout Form -->
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <?php if (isset($component)) { $__componentOriginalbac3423f24c62a1b80ce31a377ac7b66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbac3423f24c62a1b80ce31a377ac7b66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.dropdown-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault();
                                                this.closest(\'form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault();
                                                this.closest(\'form\').submit();']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                                <?php echo e(__('Log Out')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbac3423f24c62a1b80ce31a377ac7b66)): ?>
<?php $attributes = $__attributesOriginalbac3423f24c62a1b80ce31a377ac7b66; ?>
<?php unset($__attributesOriginalbac3423f24c62a1b80ce31a377ac7b66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbac3423f24c62a1b80ce31a377ac7b66)): ?>
<?php $component = $__componentOriginalbac3423f24c62a1b80ce31a377ac7b66; ?>
<?php unset($__componentOriginalbac3423f24c62a1b80ce31a377ac7b66); ?>
<?php endif; ?>
                        </form>
                        <!-- End: Logout Form -->
                     <?php $__env->endSlot(); ?>
                    <!-- End: Dropdown Content -->
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleea726fa4f84deb9f7684b50bdd6328c)): ?>
<?php $attributes = $__attributesOriginaleea726fa4f84deb9f7684b50bdd6328c; ?>
<?php unset($__attributesOriginaleea726fa4f84deb9f7684b50bdd6328c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleea726fa4f84deb9f7684b50bdd6328c)): ?>
<?php $component = $__componentOriginaleea726fa4f84deb9f7684b50bdd6328c; ?>
<?php unset($__componentOriginaleea726fa4f84deb9f7684b50bdd6328c); ?>
<?php endif; ?>
            </div>
            <!-- End: Settings Dropdown -->

            <!-- Start: Hamburger Button (mobile only) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <!-- Start: Hamburger icon (≡) -->
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <!-- End: Hamburger icon -->

                        <!-- Start: Close icon (✕) -->
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        <!-- End: Close icon -->
                    </svg>
                </button>
            </div>
            <!-- End: Hamburger Button -->
        </div>
    </div>
    <!-- End: Primary Navigation Container -->

    <!-- Start: Responsive Navigation Menu (mobile only, toggled by hamburger) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <!-- Start: Mobile Nav Links -->
        <div class="pt-2 pb-3 space-y-1">
            <?php if (isset($component)) { $__componentOriginal92132f96bca6b443903f03fa5404876e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92132f96bca6b443903f03fa5404876e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.responsive-nav-link','data' => ['href' => route('dashboard'),'active' => request()->routeIs('dashboard')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav.responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('dashboard')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('dashboard'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                <?php echo e(__('Dashboard')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal92132f96bca6b443903f03fa5404876e)): ?>
<?php $attributes = $__attributesOriginal92132f96bca6b443903f03fa5404876e; ?>
<?php unset($__attributesOriginal92132f96bca6b443903f03fa5404876e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92132f96bca6b443903f03fa5404876e)): ?>
<?php $component = $__componentOriginal92132f96bca6b443903f03fa5404876e; ?>
<?php unset($__componentOriginal92132f96bca6b443903f03fa5404876e); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal92132f96bca6b443903f03fa5404876e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92132f96bca6b443903f03fa5404876e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.responsive-nav-link','data' => ['href' => route('skills.index'),'active' => request()->routeIs('skills.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav.responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('skills.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('skills.*'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                <?php echo e(__('Skills')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal92132f96bca6b443903f03fa5404876e)): ?>
<?php $attributes = $__attributesOriginal92132f96bca6b443903f03fa5404876e; ?>
<?php unset($__attributesOriginal92132f96bca6b443903f03fa5404876e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92132f96bca6b443903f03fa5404876e)): ?>
<?php $component = $__componentOriginal92132f96bca6b443903f03fa5404876e; ?>
<?php unset($__componentOriginal92132f96bca6b443903f03fa5404876e); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal92132f96bca6b443903f03fa5404876e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92132f96bca6b443903f03fa5404876e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.responsive-nav-link','data' => ['href' => route('category.index'),'active' => request()->routeIs('category.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav.responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('category.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('category.*'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                <?php echo e(__('Categories')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal92132f96bca6b443903f03fa5404876e)): ?>
<?php $attributes = $__attributesOriginal92132f96bca6b443903f03fa5404876e; ?>
<?php unset($__attributesOriginal92132f96bca6b443903f03fa5404876e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92132f96bca6b443903f03fa5404876e)): ?>
<?php $component = $__componentOriginal92132f96bca6b443903f03fa5404876e; ?>
<?php unset($__componentOriginal92132f96bca6b443903f03fa5404876e); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal92132f96bca6b443903f03fa5404876e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92132f96bca6b443903f03fa5404876e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.responsive-nav-link','data' => ['href' => route('tasks.index'),'active' => request()->routeIs('tasks.*')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav.responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('tasks.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('tasks.*'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                <?php echo e(__('Task')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal92132f96bca6b443903f03fa5404876e)): ?>
<?php $attributes = $__attributesOriginal92132f96bca6b443903f03fa5404876e; ?>
<?php unset($__attributesOriginal92132f96bca6b443903f03fa5404876e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92132f96bca6b443903f03fa5404876e)): ?>
<?php $component = $__componentOriginal92132f96bca6b443903f03fa5404876e; ?>
<?php unset($__componentOriginal92132f96bca6b443903f03fa5404876e); ?>
<?php endif; ?>
            <!-- Add more mobile links here -->
        </div>
        <!-- End: Mobile Nav Links -->

        <!-- Start: Mobile Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <!-- Start: Mobile User Info -->
            <div class="px-4">
                <div class="font-medium text-base text-gray-800"><?php echo e(Auth::user()->name); ?></div>
                <div class="font-medium text-sm text-gray-500"><?php echo e(Auth::user()->email); ?></div>
            </div>
            <!-- End: Mobile User Info -->

            <!-- Start: Mobile User Actions -->
            <div class="mt-3 space-y-1">
                <?php if (isset($component)) { $__componentOriginal92132f96bca6b443903f03fa5404876e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92132f96bca6b443903f03fa5404876e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.responsive-nav-link','data' => ['href' => route('profile.edit')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav.responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('profile.edit'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    <?php echo e(__('Profile')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal92132f96bca6b443903f03fa5404876e)): ?>
<?php $attributes = $__attributesOriginal92132f96bca6b443903f03fa5404876e; ?>
<?php unset($__attributesOriginal92132f96bca6b443903f03fa5404876e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92132f96bca6b443903f03fa5404876e)): ?>
<?php $component = $__componentOriginal92132f96bca6b443903f03fa5404876e; ?>
<?php unset($__componentOriginal92132f96bca6b443903f03fa5404876e); ?>
<?php endif; ?>

                <!-- Start: Mobile Logout Form -->
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php if (isset($component)) { $__componentOriginal92132f96bca6b443903f03fa5404876e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92132f96bca6b443903f03fa5404876e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.responsive-nav-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault();
                                        this.closest(\'form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav.responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault();
                                        this.closest(\'form\').submit();']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        <?php echo e(__('Log Out')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal92132f96bca6b443903f03fa5404876e)): ?>
<?php $attributes = $__attributesOriginal92132f96bca6b443903f03fa5404876e; ?>
<?php unset($__attributesOriginal92132f96bca6b443903f03fa5404876e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92132f96bca6b443903f03fa5404876e)): ?>
<?php $component = $__componentOriginal92132f96bca6b443903f03fa5404876e; ?>
<?php unset($__componentOriginal92132f96bca6b443903f03fa5404876e); ?>
<?php endif; ?>
                </form>
                <!-- End: Mobile Logout Form -->
            </div>
            <!-- End: Mobile User Actions -->
        </div>
        <!-- End: Mobile Settings Options -->
    </div>
    <!-- End: Responsive Navigation Menu -->
</nav>
<!-- End: Navigation Bar -->
<?php /**PATH C:\Users\universal\Herd\my-first-app\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>