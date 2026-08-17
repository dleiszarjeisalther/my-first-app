

<!-- Start: App Layout -->
<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <!-- Start: Header Slot -->
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Skills')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <!-- End: Header Slot -->

    <!-- Start: Main Container -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Start: Header Section (Greeting & Add Skill Button) -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Hello, <?php echo e($user_name); ?>!</h1>
                <?php if (isset($component)) { $__componentOriginalb0083d113ecf7b04bfc3fa94a403051e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb0083d113ecf7b04bfc3fa94a403051e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.button-link','data' => ['href' => ''.e(route('skills.create')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttons.button-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('skills.create')).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    Add Skill
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb0083d113ecf7b04bfc3fa94a403051e)): ?>
<?php $attributes = $__attributesOriginalb0083d113ecf7b04bfc3fa94a403051e; ?>
<?php unset($__attributesOriginalb0083d113ecf7b04bfc3fa94a403051e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb0083d113ecf7b04bfc3fa94a403051e)): ?>
<?php $component = $__componentOriginalb0083d113ecf7b04bfc3fa94a403051e; ?>
<?php unset($__componentOriginalb0083d113ecf7b04bfc3fa94a403051e); ?>
<?php endif; ?>
            </div>
            <!-- End: Header Section -->

            <!-- Start: Flash Alert Message -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                <?php if (isset($component)) { $__componentOriginal746de018ded8594083eb43be3f1332e1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal746de018ded8594083eb43be3f1332e1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.alert','data' => ['type' => 'success','message' => ''.e(session('success')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'success','message' => ''.e(session('success')).'']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal746de018ded8594083eb43be3f1332e1)): ?>
<?php $attributes = $__attributesOriginal746de018ded8594083eb43be3f1332e1; ?>
<?php unset($__attributesOriginal746de018ded8594083eb43be3f1332e1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal746de018ded8594083eb43be3f1332e1)): ?>
<?php $component = $__componentOriginal746de018ded8594083eb43be3f1332e1; ?>
<?php unset($__componentOriginal746de018ded8594083eb43be3f1332e1); ?>
<?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <!-- End: Flash Alert Message -->

            <!-- Start: Skills List -->
            <ul class="mt-2 space-y-2">
                <!-- Start: Skill Item Loop -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <!-- Start: Skill Card -->
                    <?php if (isset($component)) { $__componentOriginaldae4cd48acb67888a4631e1ba48f2f93 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.card','data' => ['class' => 'flex justify-between items-center mb-2 border-l-4 border-red-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex justify-between items-center mb-2 border-l-4 border-red-500']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        <!-- Start: Skill Info (Name & Category Badge) -->
                        <div>
                            <span class="font-bold text-gray-800">🚀 <?php echo e($skill->name); ?></span>
                            <?php if (isset($component)) { $__componentOriginalab7baa01105b3dfe1e0cf1dfc58879b4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalab7baa01105b3dfe1e0cf1dfc58879b4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.badge','data' => ['color' => 'gray','class' => 'ml-2 uppercase']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'gray','class' => 'ml-2 uppercase']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                                <?php echo e($skill->category->name); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalab7baa01105b3dfe1e0cf1dfc58879b4)): ?>
<?php $attributes = $__attributesOriginalab7baa01105b3dfe1e0cf1dfc58879b4; ?>
<?php unset($__attributesOriginalab7baa01105b3dfe1e0cf1dfc58879b4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalab7baa01105b3dfe1e0cf1dfc58879b4)): ?>
<?php $component = $__componentOriginalab7baa01105b3dfe1e0cf1dfc58879b4; ?>
<?php unset($__componentOriginalab7baa01105b3dfe1e0cf1dfc58879b4); ?>
<?php endif; ?>
                        </div>
                        <!-- End: Skill Info -->

                        <!-- Start: Skill Actions (Percent, Edit & Delete) -->
                        <div class="flex items-center space-x-4">
                            <span class="font-bold text-red-500"><?php echo e($skill->percent); ?>%</span>
                            <!-- Start: Edit Button -->
                                <?php if (isset($component)) { $__componentOriginalb0083d113ecf7b04bfc3fa94a403051e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb0083d113ecf7b04bfc3fa94a403051e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.button-link','data' => ['href' => ''.e(route('skills.edit', $skill->id)).'','class' => 'bg-gray-50 hover:bg-gray-100 text-gray-600 border border-gray-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttons.button-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('skills.edit', $skill->id)).'','class' => 'bg-gray-50 hover:bg-gray-100 text-gray-600 border border-gray-200']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb0083d113ecf7b04bfc3fa94a403051e)): ?>
<?php $attributes = $__attributesOriginalb0083d113ecf7b04bfc3fa94a403051e; ?>
<?php unset($__attributesOriginalb0083d113ecf7b04bfc3fa94a403051e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb0083d113ecf7b04bfc3fa94a403051e)): ?>
<?php $component = $__componentOriginalb0083d113ecf7b04bfc3fa94a403051e; ?>
<?php unset($__componentOriginalb0083d113ecf7b04bfc3fa94a403051e); ?>
<?php endif; ?>
                                <!-- End: Edit Button -->
                            
                            <!-- Start: Delete Form & Modal -->
                            <?php if (isset($component)) { $__componentOriginalc6eccc84c547bc62667cd749f508b1a4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc6eccc84c547bc62667cd749f508b1a4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.prevent-double-submit','data' => ['action' => route('skills.destroy', $skill->id)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.prevent-double-submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('skills.destroy', $skill->id))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <?php if (isset($component)) { $__componentOriginald684f3bbff7e9f78d50f7cca93f6817d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald684f3bbff7e9f78d50f7cca93f6817d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.danger-button','data' => ['type' => 'button','@click' => '$dispatch(\'open-modal\', \'confirm-delete-skill-'.e($skill->id).'\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttons.danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','@click' => '$dispatch(\'open-modal\', \'confirm-delete-skill-'.e($skill->id).'\')']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                                    Delete
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald684f3bbff7e9f78d50f7cca93f6817d)): ?>
<?php $attributes = $__attributesOriginald684f3bbff7e9f78d50f7cca93f6817d; ?>
<?php unset($__attributesOriginald684f3bbff7e9f78d50f7cca93f6817d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald684f3bbff7e9f78d50f7cca93f6817d)): ?>
<?php $component = $__componentOriginald684f3bbff7e9f78d50f7cca93f6817d; ?>
<?php unset($__componentOriginald684f3bbff7e9f78d50f7cca93f6817d); ?>
<?php endif; ?>

                                <!-- Start: Delete Confirmation Modal -->
                                <?php if (isset($component)) { $__componentOriginal7762953202be6518eecd1cfbd075bf2f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7762953202be6518eecd1cfbd075bf2f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.modal','data' => ['name' => 'confirm-delete-skill-'.e($skill->id).'','show' => false,'maxWidth' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'confirm-delete-skill-'.e($skill->id).'','show' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'maxWidth' => 'sm']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                                    <div class="p-6">
                                        <h2 class="text-lg font-bold text-gray-900">Are you sure?</h2>
                                        <p class="mt-2 text-sm text-gray-600">
                                            Delete this skill? This action cannot be undone.
                                        </p>
                                        <!-- Start: Modal Buttons -->
                                        <div class="mt-6 flex justify-end gap-3">
                                            <?php if (isset($component)) { $__componentOriginal0572c7df6c527340ebe5adcba5081ea6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0572c7df6c527340ebe5adcba5081ea6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.secondary-button','data' => ['type' => 'button','@click' => '$dispatch(\'close-modal\', \'confirm-delete-skill-'.e($skill->id).'\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttons.secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','@click' => '$dispatch(\'close-modal\', \'confirm-delete-skill-'.e($skill->id).'\')']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                                                Cancel
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0572c7df6c527340ebe5adcba5081ea6)): ?>
<?php $attributes = $__attributesOriginal0572c7df6c527340ebe5adcba5081ea6; ?>
<?php unset($__attributesOriginal0572c7df6c527340ebe5adcba5081ea6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0572c7df6c527340ebe5adcba5081ea6)): ?>
<?php $component = $__componentOriginal0572c7df6c527340ebe5adcba5081ea6; ?>
<?php unset($__componentOriginal0572c7df6c527340ebe5adcba5081ea6); ?>
<?php endif; ?>
                                            <?php if (isset($component)) { $__componentOriginald684f3bbff7e9f78d50f7cca93f6817d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald684f3bbff7e9f78d50f7cca93f6817d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.danger-button','data' => ['type' => 'submit','xBind:disabled' => 'submitting','xBind:class' => '{ \'opacity-50 cursor-not-allowed\': submitting }']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttons.danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','x-bind:disabled' => 'submitting','x-bind:class' => '{ \'opacity-50 cursor-not-allowed\': submitting }']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                                                Yes, Delete
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald684f3bbff7e9f78d50f7cca93f6817d)): ?>
<?php $attributes = $__attributesOriginald684f3bbff7e9f78d50f7cca93f6817d; ?>
<?php unset($__attributesOriginald684f3bbff7e9f78d50f7cca93f6817d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald684f3bbff7e9f78d50f7cca93f6817d)): ?>
<?php $component = $__componentOriginald684f3bbff7e9f78d50f7cca93f6817d; ?>
<?php unset($__componentOriginald684f3bbff7e9f78d50f7cca93f6817d); ?>
<?php endif; ?>
                                        </div>
                                        <!-- End: Modal Buttons -->
                                    </div>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7762953202be6518eecd1cfbd075bf2f)): ?>
<?php $attributes = $__attributesOriginal7762953202be6518eecd1cfbd075bf2f; ?>
<?php unset($__attributesOriginal7762953202be6518eecd1cfbd075bf2f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7762953202be6518eecd1cfbd075bf2f)): ?>
<?php $component = $__componentOriginal7762953202be6518eecd1cfbd075bf2f; ?>
<?php unset($__componentOriginal7762953202be6518eecd1cfbd075bf2f); ?>
<?php endif; ?>
                                <!-- End: Delete Confirmation Modal -->
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc6eccc84c547bc62667cd749f508b1a4)): ?>
<?php $attributes = $__attributesOriginalc6eccc84c547bc62667cd749f508b1a4; ?>
<?php unset($__attributesOriginalc6eccc84c547bc62667cd749f508b1a4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc6eccc84c547bc62667cd749f508b1a4)): ?>
<?php $component = $__componentOriginalc6eccc84c547bc62667cd749f508b1a4; ?>
<?php unset($__componentOriginalc6eccc84c547bc62667cd749f508b1a4); ?>
<?php endif; ?>
                            <!-- End: Delete Form & Modal -->
                        </div>
                        <!-- End: Skill Actions -->
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93)): ?>
<?php $attributes = $__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93; ?>
<?php unset($__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldae4cd48acb67888a4631e1ba48f2f93)): ?>
<?php $component = $__componentOriginaldae4cd48acb67888a4631e1ba48f2f93; ?>
<?php unset($__componentOriginaldae4cd48acb67888a4631e1ba48f2f93); ?>
<?php endif; ?>
                    <!-- End: Skill Card -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <!-- End: Skill Item Loop -->
            </ul>
            <!-- End: Skills List -->
        </div>
    </div>
    <!-- End: Main Container -->
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<!-- End: App Layout -->
<?php /**PATH C:\Users\universal\Herd\my-first-app\resources\views/skills/index.blade.php ENDPATH**/ ?>