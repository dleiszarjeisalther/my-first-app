

<div <?php echo e($attributes->merge(['class' => config('ui.ui.table.wrapper_outer')])); ?>>
    <div class="<?php echo e(config('ui.ui.table.wrapper_middle')); ?>">
        <div class="<?php echo e(config('ui.ui.table.wrapper_inner')); ?>">
            <div class="<?php echo e(config('ui.ui.table.container')); ?>">
                <table class="<?php echo e(config('ui.ui.table.table')); ?>">
                    <thead class="<?php echo e(config('ui.ui.table.thead')); ?>">
                        <?php echo e($header); ?>

                    </thead>
                    <tbody class="<?php echo e(config('ui.ui.table.tbody')); ?>">
                        <?php echo e($slot); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\universal\Herd\my-first-app\resources\views/components/ui/table.blade.php ENDPATH**/ ?>