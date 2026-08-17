<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'action',
    'method' => 'POST',
    'multiSubmit' => false,
    'confirm' => null,
]));

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

foreach (array_filter(([
    'action',
    'method' => 'POST',
    'multiSubmit' => false,
    'confirm' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<!-- Start: Prevent Double Submit Form -->
<form
    action="<?php echo e($action); ?>"
    method="<?php echo e($method); ?>"
    x-data="{ submitting: false, redirectTo: '' }"
    @submit="submitting = true"
    <?php if($confirm): ?> onsubmit="return confirm(<?php echo \Illuminate\Support\Js::from($confirm)->toHtml() ?>)" <?php endif; ?>
    <?php echo e($attributes); ?>

>
    <!-- Start: Multi Submit Redirect Input -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($multiSubmit): ?>
        <input type="hidden" name="redirect_to" :value="redirectTo">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <!-- End: Multi Submit Redirect Input -->

    <?php echo e($slot); ?>

</form>
<!-- End: Prevent Double Submit Form -->
<?php /**PATH C:\Users\universal\Herd\my-first-app\resources\views/components/form/prevent-double-submit.blade.php ENDPATH**/ ?>