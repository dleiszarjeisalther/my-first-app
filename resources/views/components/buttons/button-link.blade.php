<!-- Start: Button Link -->
<a {{ $attributes->merge(['class' => config('ui.buttons.primary')]) }}>
    {{ $slot }}
</a>
<!-- End: Button Link -->
