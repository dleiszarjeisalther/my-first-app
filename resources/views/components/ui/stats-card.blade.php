{{--
    WHAT IT IS:
    The Stats Card is a specialized card used to highlight a single metric or number.
    It is the backbone of any professional dashboard.

    HOW IT WORKS:
    - It uses a large, bold font for the `value` to make it stand out.
    - It provides a small sub-text area for the `label`.

    DATA:
    - $label: (string) The name of the metric (e.g., "Total Users").
    - $value: (string) The number or result (e.g., "1,234").
    - $icon:  (slot)   Optional icon slot for visual flair.

    HOW TO CUSTOMIZE:
    - Add a "trend" indicator (e.g., "+5%") by adding a new slot.
    - Change the text color of the value to indigo or emerald.
--}}

@props(['label', 'value'])

<div {{ $attributes->merge(['class' => 'bg-white overflow-hidden shadow sm:rounded-lg p-5']) }}>
    <div class="flex items-center">
        @if (isset($icon))
            <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3 text-white">
                {{ $icon }}
            </div>
        @endif
        <div class="{{ isset($icon) ? 'ml-5' : '' }} w-0 flex-1">
            <dl>
                <dt class="text-sm font-medium text-gray-500 truncate">
                    {{ $label }}
                </dt>
                <dd class="flex items-baseline">
                    <div class="text-2xl font-semibold text-gray-900">
                        {{ $value }}
                    </div>
                </dd>
            </dl>
        </div>
    </div>
</div>
