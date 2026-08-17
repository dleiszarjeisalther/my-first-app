


<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['disabled' => false]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['disabled' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<!-- Hidden input sends 0 when unchecked -->
<input type="hidden" name="<?php echo e($attributes->get('name')); ?>" value="0">

<!-- Checkbox sends 1 when checked and overrides the hidden 0 -->
<input 
    type="checkbox"
    value="1"
    <?php echo e($disabled ? 'disabled' : ''); ?>

    <?php echo e($attributes->merge(['class' => 'rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500'])); ?>>



<?php /**PATH C:\Users\universal\Herd\my-first-app\resources\views/components/forms/checkbox.blade.php ENDPATH**/ ?>