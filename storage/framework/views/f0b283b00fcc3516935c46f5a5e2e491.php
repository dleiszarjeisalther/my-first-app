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

    

     <?php $__env->slot('header', null, []); ?> 
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <?php echo e(__('My Skills')); ?>

            </h2>
            <a href="<?php echo e(route('skills.create')); ?>" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                + Add New Skill
            </a>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">Hello, <?php echo e($user_name); ?>!</h1>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                <div id="flash-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>



            
            <ul class="mt-2 space-y-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <li id="skill-item-<?php echo e($skill->id); ?>" class="flex justify-between items-center bg-white p-6 shadow-sm rounded-lg border-l-4 border-indigo-500 transition-all hover:shadow-md">
                        <div>
                            <div class="flex items-center">
                                <span class="font-bold text-lg text-gray-900">🚀 <?php echo e($skill->name); ?></span>
                                <span class="ml-3 text-[10px] font-bold bg-indigo-100 text-indigo-700 px-2 py-0.5 rounded-full uppercase tracking-wider">
                                    <?php echo e($skill->category->name ?? 'Uncategorized'); ?>

                                </span>
                            </div>
                            <div class="mt-2 w-48 bg-gray-200 rounded-full h-1.5">
                                <div class="bg-indigo-600 h-1.5 rounded-full" :style="'width: <?php echo e($skill->percent); ?>%'"></div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <span class="font-bold text-indigo-600 text-lg"><?php echo e($skill->percent); ?>%</span>
                            <div class="flex space-x-2">
                                <a href="<?php echo e(route('skills.edit', $skill->id)); ?>" class="text-indigo-500 hover:text-indigo-700 font-medium">Edit</a>
                                
                                
                                <?php if (isset($component)) { $__componentOriginald684f3bbff7e9f78d50f7cca93f6817d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald684f3bbff7e9f78d50f7cca93f6817d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.danger-button','data' => ['xData' => '','xOn:click.prevent' => '$dispatch(\'open-modal\', \'confirm-skill-deletion\'); $dispatch(\'set-deletion-url\', \''.e(route('skills.destroy', $skill->id)).'\')','class' => 'text-[10px] py-1 px-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttons.danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-data' => '','x-on:click.prevent' => '$dispatch(\'open-modal\', \'confirm-skill-deletion\'); $dispatch(\'set-deletion-url\', \''.e(route('skills.destroy', $skill->id)).'\')','class' => 'text-[10px] py-1 px-3']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                                    <?php echo e(__('Delete')); ?>

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
                        </div>
                    </li>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    
                    <div id="empty-state" class="bg-white p-8 rounded-lg shadow text-center">
                        <p class="text-gray-500 italic">No skills added yet. Start by adding one!</p>
                        <a href="<?php echo e(route('skills.create')); ?>" class="mt-4 inline-block text-indigo-600 hover:underline">Add your first skill</a>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    </div>

    
    <?php if (isset($component)) { $__componentOriginal7762953202be6518eecd1cfbd075bf2f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7762953202be6518eecd1cfbd075bf2f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.modal','data' => ['name' => 'confirm-skill-deletion','focusable' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'confirm-skill-deletion','focusable' => true]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

        <form id="delete-skill-form" x-data="{ actionUrl: '' }" 
              x-on:set-deletion-url.window="actionUrl = $event.detail"
              :action="actionUrl" 
              method="post" class="p-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>

            <h2 class="text-lg font-medium text-gray-900">
                <?php echo e(__('Are you sure you want to delete this skill?')); ?>

            </h2>

            <p class="mt-1 text-sm text-gray-600">
                <?php echo e(__('This action cannot be undone. All data associated with this skill will be permanently removed.')); ?>

            </p>

            <div class="mt-6 flex justify-end">
                <?php if (isset($component)) { $__componentOriginal0572c7df6c527340ebe5adcba5081ea6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0572c7df6c527340ebe5adcba5081ea6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.secondary-button','data' => ['xOn:click' => '$dispatch(\'close\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttons.secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => '$dispatch(\'close\')']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    <?php echo e(__('Cancel')); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.buttons.danger-button','data' => ['class' => 'ms-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('buttons.danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ms-3']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    <?php echo e(__('Delete Skill')); ?>

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
        </form>
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
<?php /**PATH C:\Users\universal\Herd\my-first-app\resources\views/skills/skills.blade.php ENDPATH**/ ?>