<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            <?php echo e(__('Update Password')); ?>

        </h2>

        <p class="mt-1 text-sm text-gray-600">
            <?php echo e(__('Ensure your account is using a long, random password to stay secure.')); ?>

        </p>
    </header>

    <form method="post" action="<?php echo e(route('password.update')); ?>" class="mt-6 space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>

        <div>
            <?php if (isset($component)) { $__componentOriginalabddde62786fb871e8a66d2206a4e797 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalabddde62786fb871e8a66d2206a4e797 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input-label','data' => ['for' => 'update_password_current_password','value' => __('Current Password')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'update_password_current_password','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Current Password'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.text-input','data' => ['id' => 'update_password_current_password','name' => 'current_password','type' => 'password','class' => 'mt-1 block w-full','autocomplete' => 'current-password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'update_password_current_password','name' => 'current_password','type' => 'password','class' => 'mt-1 block w-full','autocomplete' => 'current-password']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input-error','data' => ['messages' => $errors->updatePassword->get('current_password'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->updatePassword->get('current_password')),'class' => 'mt-2']); ?>
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

        <div>
            <?php if (isset($component)) { $__componentOriginalabddde62786fb871e8a66d2206a4e797 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalabddde62786fb871e8a66d2206a4e797 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input-label','data' => ['for' => 'update_password_password','value' => __('New Password')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'update_password_password','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('New Password'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.text-input','data' => ['id' => 'update_password_password','name' => 'password','type' => 'password','class' => 'mt-1 block w-full','autocomplete' => 'new-password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'update_password_password','name' => 'password','type' => 'password','class' => 'mt-1 block w-full','autocomplete' => 'new-password']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input-error','data' => ['messages' => $errors->updatePassword->get('password'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->updatePassword->get('password')),'class' => 'mt-2']); ?>
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

        <div>
            <?php if (isset($component)) { $__componentOriginalabddde62786fb871e8a66d2206a4e797 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalabddde62786fb871e8a66d2206a4e797 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input-label','data' => ['for' => 'update_password_password_confirmation','value' => __('Confirm Password')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'update_password_password_confirmation','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Confirm Password'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.text-input','data' => ['id' => 'update_password_password_confirmation','name' => 'password_confirmation','type' => 'password','class' => 'mt-1 block w-full','autocomplete' => 'new-password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'update_password_password_confirmation','name' => 'password_confirmation','type' => 'password','class' => 'mt-1 block w-full','autocomplete' => 'new-password']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.input-error','data' => ['messages' => $errors->updatePassword->get('password_confirmation'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->updatePassword->get('password_confirmation')),'class' => 'mt-2']); ?>
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

        <div class="flex items-center gap-4">
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
<?php echo e(__('Save')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal54c5a1a52b6cf346236637a05b110723)): ?>
<?php $attributes = $__attributesOriginal54c5a1a52b6cf346236637a05b110723; ?>
<?php unset($__attributesOriginal54c5a1a52b6cf346236637a05b110723); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal54c5a1a52b6cf346236637a05b110723)): ?>
<?php $component = $__componentOriginal54c5a1a52b6cf346236637a05b110723; ?>
<?php unset($__componentOriginal54c5a1a52b6cf346236637a05b110723); ?>
<?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('status') === 'password-updated'): ?>
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                ><?php echo e(__('Saved.')); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </form>
</section>
<?php /**PATH C:\Users\universal\Herd\my-first-app\resources\views/profile/partials/update-password-form.blade.php ENDPATH**/ ?>