
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white']));

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

foreach (array_filter((['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
// Convert the align prop into Tailwind positioning classes
$alignmentClasses = match ($align) {
    'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
    'top'  => 'origin-top',
    default => 'ltr:origin-top-right rtl:origin-top-left end-0',
};

// Convert the width prop into a Tailwind w-* class
$width = match ($width) {
    '48'    => 'w-48',
    default => $width,
};
?>

<!-- Start: Dropdown Container -->
<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <!-- Start: Dropdown Trigger -->
    <div @click="open = ! open">
        <?php echo e($trigger); ?>

    </div>
    <!-- End: Dropdown Trigger -->

    <!-- Start: Dropdown Panel -->
    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute z-50 mt-2 <?php echo e($width); ?> rounded-md shadow-lg <?php echo e($alignmentClasses); ?>"
            style="display: none;"
            @click="open = false">
        <div class="rounded-md ring-1 ring-black ring-opacity-5 <?php echo e($contentClasses); ?>">
            <?php echo e($content); ?>

        </div>
    </div>
    <!-- End: Dropdown Panel -->
</div>
<!-- End: Dropdown Container -->
<?php /**PATH C:\Users\universal\Herd\my-first-app\resources\views/components/ui/dropdown.blade.php ENDPATH**/ ?>