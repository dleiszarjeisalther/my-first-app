<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <form method="POST" action="<?php echo e(route('password.store')); ?>">
        <?php echo csrf_field(); ?>

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">

        <!-- Email Address -->
        <div>
            <?php if (isset($component)) { $__componentOriginalabddde62786fb871e8a66d2206a4e797 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalabddde62786fb871e8a66d2206a4e797 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input-label','data' => ['for' => 'email','value' => __('Email')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'email','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Email'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalabddde62786fb871e8a66d2206a4e797)): ?>
<?php $attributes = $__attributesOriginalabddde62786fb871e8a66d2206a4e797; ?>
<?php unset($__attributesOriginalabddde62786fb871e8a66d2206a4e797); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalabddde62786fb871e8a66d2206a4e797)): ?>
<?php $component = $__componentOriginalabddde62786fb871e8a66d2206a4e797; ?>
<?php unset($__componentOriginalabddde62786fb871e8a66d2206a4e797); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginaldca3bb76b5bf0aaf83ee2266180b6d2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldca3bb76b5bf0aaf83ee2266180b6d2c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.text-input','data' => ['id' => 'email','class' => 'block mt-1 w-full','type' => 'email','name' => 'email','value' => old('email', $request->email),'required' => true,'autofocus' => true,'autocomplete' => 'username']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'email','class' => 'block mt-1 w-full','type' => 'email','name' => 'email','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('email', $request->email)),'required' => true,'autofocus' => true,'autocomplete' => 'username']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldca3bb76b5bf0aaf83ee2266180b6d2c)): ?>
<?php $attributes = $__attributesOriginaldca3bb76b5bf0aaf83ee2266180b6d2c; ?>
<?php unset($__attributesOriginaldca3bb76b5bf0aaf83ee2266180b6d2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldca3bb76b5bf0aaf83ee2266180b6d2c)): ?>
<?php $component = $__componentOriginaldca3bb76b5bf0aaf83ee2266180b6d2c; ?>
<?php unset($__componentOriginaldca3bb76b5bf0aaf83ee2266180b6d2c); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalcfef9ae9d181bd9f9c23f131244452e1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcfef9ae9d181bd9f9c23f131244452e1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input-error','data' => ['messages' => $errors->get('email'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('email')),'class' => 'mt-2']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcfef9ae9d181bd9f9c23f131244452e1)): ?>
<?php $attributes = $__attributesOriginalcfef9ae9d181bd9f9c23f131244452e1; ?>
<?php unset($__attributesOriginalcfef9ae9d181bd9f9c23f131244452e1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcfef9ae9d181bd9f9c23f131244452e1)): ?>
<?php $component = $__componentOriginalcfef9ae9d181bd9f9c23f131244452e1; ?>
<?php unset($__componentOriginalcfef9ae9d181bd9f9c23f131244452e1); ?>
<?php endif; ?>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <?php if (isset($component)) { $__componentOriginalabddde62786fb871e8a66d2206a4e797 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalabddde62786fb871e8a66d2206a4e797 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input-label','data' => ['for' => 'password','value' => __('Password')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'password','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Password'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalabddde62786fb871e8a66d2206a4e797)): ?>
<?php $attributes = $__attributesOriginalabddde62786fb871e8a66d2206a4e797; ?>
<?php unset($__attributesOriginalabddde62786fb871e8a66d2206a4e797); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalabddde62786fb871e8a66d2206a4e797)): ?>
<?php $component = $__componentOriginalabddde62786fb871e8a66d2206a4e797; ?>
<?php unset($__componentOriginalabddde62786fb871e8a66d2206a4e797); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginaled5a3769b9bfa39670bf2294b3a22249 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled5a3769b9bfa39670bf2294b3a22249 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.password-input','data' => ['id' => 'password','class' => 'block mt-1 w-full','name' => 'password','required' => true,'autocomplete' => 'new-password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.password-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'password','class' => 'block mt-1 w-full','name' => 'password','required' => true,'autocomplete' => 'new-password']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled5a3769b9bfa39670bf2294b3a22249)): ?>
<?php $attributes = $__attributesOriginaled5a3769b9bfa39670bf2294b3a22249; ?>
<?php unset($__attributesOriginaled5a3769b9bfa39670bf2294b3a22249); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled5a3769b9bfa39670bf2294b3a22249)): ?>
<?php $component = $__componentOriginaled5a3769b9bfa39670bf2294b3a22249; ?>
<?php unset($__componentOriginaled5a3769b9bfa39670bf2294b3a22249); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalcfef9ae9d181bd9f9c23f131244452e1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcfef9ae9d181bd9f9c23f131244452e1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input-error','data' => ['messages' => $errors->get('password'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password')),'class' => 'mt-2']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcfef9ae9d181bd9f9c23f131244452e1)): ?>
<?php $attributes = $__attributesOriginalcfef9ae9d181bd9f9c23f131244452e1; ?>
<?php unset($__attributesOriginalcfef9ae9d181bd9f9c23f131244452e1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcfef9ae9d181bd9f9c23f131244452e1)): ?>
<?php $component = $__componentOriginalcfef9ae9d181bd9f9c23f131244452e1; ?>
<?php unset($__componentOriginalcfef9ae9d181bd9f9c23f131244452e1); ?>
<?php endif; ?>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <?php if (isset($component)) { $__componentOriginalabddde62786fb871e8a66d2206a4e797 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalabddde62786fb871e8a66d2206a4e797 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input-label','data' => ['for' => 'password_confirmation','value' => __('Confirm Password')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'password_confirmation','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Confirm Password'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalabddde62786fb871e8a66d2206a4e797)): ?>
<?php $attributes = $__attributesOriginalabddde62786fb871e8a66d2206a4e797; ?>
<?php unset($__attributesOriginalabddde62786fb871e8a66d2206a4e797); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalabddde62786fb871e8a66d2206a4e797)): ?>
<?php $component = $__componentOriginalabddde62786fb871e8a66d2206a4e797; ?>
<?php unset($__componentOriginalabddde62786fb871e8a66d2206a4e797); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginaled5a3769b9bfa39670bf2294b3a22249 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaled5a3769b9bfa39670bf2294b3a22249 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.password-input','data' => ['id' => 'password_confirmation','class' => 'block mt-1 w-full','name' => 'password_confirmation','required' => true,'autocomplete' => 'new-password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.password-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'password_confirmation','class' => 'block mt-1 w-full','name' => 'password_confirmation','required' => true,'autocomplete' => 'new-password']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaled5a3769b9bfa39670bf2294b3a22249)): ?>
<?php $attributes = $__attributesOriginaled5a3769b9bfa39670bf2294b3a22249; ?>
<?php unset($__attributesOriginaled5a3769b9bfa39670bf2294b3a22249); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaled5a3769b9bfa39670bf2294b3a22249)): ?>
<?php $component = $__componentOriginaled5a3769b9bfa39670bf2294b3a22249; ?>
<?php unset($__componentOriginaled5a3769b9bfa39670bf2294b3a22249); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalcfef9ae9d181bd9f9c23f131244452e1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcfef9ae9d181bd9f9c23f131244452e1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input-error','data' => ['messages' => $errors->get('password_confirmation'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password_confirmation')),'class' => 'mt-2']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcfef9ae9d181bd9f9c23f131244452e1)): ?>
<?php $attributes = $__attributesOriginalcfef9ae9d181bd9f9c23f131244452e1; ?>
<?php unset($__attributesOriginalcfef9ae9d181bd9f9c23f131244452e1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcfef9ae9d181bd9f9c23f131244452e1)): ?>
<?php $component = $__componentOriginalcfef9ae9d181bd9f9c23f131244452e1; ?>
<?php unset($__componentOriginalcfef9ae9d181bd9f9c23f131244452e1); ?>
<?php endif; ?>
        </div>

        <div class="flex items-center justify-end mt-4">
            <?php if (isset($component)) { $__componentOriginal54c5a1a52b6cf346236637a05b110723 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal54c5a1a52b6cf346236637a05b110723 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.primary-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttons.primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                <?php echo e(__('Reset Password')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal54c5a1a52b6cf346236637a05b110723)): ?>
<?php $attributes = $__attributesOriginal54c5a1a52b6cf346236637a05b110723; ?>
<?php unset($__attributesOriginal54c5a1a52b6cf346236637a05b110723); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal54c5a1a52b6cf346236637a05b110723)): ?>
<?php $component = $__componentOriginal54c5a1a52b6cf346236637a05b110723; ?>
<?php unset($__componentOriginal54c5a1a52b6cf346236637a05b110723); ?>
<?php endif; ?>
        </div>
    </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php /**PATH C:\Users\universal\Herd\my-first-app\resources\views/auth/reset-password.blade.php ENDPATH**/ ?>