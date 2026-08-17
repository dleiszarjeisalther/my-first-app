{{--
    WHAT IT IS:
    The Alert component is a banner used to provide feedback to the user.
    It is commonly used to show success messages after saving data.

    HOW IT WORKS:
    - It uses Alpine.js (`x-data`) to handle its own visibility and "dismiss" behavior.
    - It automatically hides itself after 5 seconds using a `setTimeout`.
    - It takes a `type` prop to change the styling (success, error, info).

    DATA:
    - $type:    (string) The type of alert (success, error, info). Default: success.
    - $message: (string) The text content to display.
    - $show:    (bool)   Whether to show it initially. Default: true.

    HOW TO CUSTOMIZE:
    - Change the `5000` (ms) in the `init()` function to make it disappear faster or slower.
    - Add more types (e.g., 'warning') to the `$types` array.
--}}

@props(['type' => 'success', 'message' => '', 'show' => true])

@php
    $types = [
        'success' => 'bg-green-50 text-green-800 border-green-200',
        'error'   => 'bg-red-50 text-red-800 border-red-200',
        'info'    => 'bg-blue-50 text-blue-800 border-blue-200',
    ];

    $typeClass = $types[$type] ?? $types['success'];
@endphp

<!-- Start: Alert Banner -->
@if ($message)
    <div
        x-data="{ visible: true }"
        x-init="setTimeout(() => visible = false, 5000)"
        x-show="visible"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        {{ $attributes->merge(['class' => "p-4 border rounded-md mb-4 flex items-center justify-between {$typeClass}"]) }}
    >
        <!-- Start: Alert Content (Icon & Message) -->
        <div class="flex items-center">
            <!-- Start: Type Icon -->
            <div class="flex-shrink-0">
                @if ($type === 'success')
                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                @elseif ($type === 'error')
                    <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                @endif
            </div>
            <!-- End: Type Icon -->

            <!-- Start: Message Text -->
            <div class="ml-3 font-medium">
                {{ $message }}
            </div>
            <!-- End: Message Text -->
        </div>
        <!-- End: Alert Content -->

        <!-- Start: Dismiss Button -->
        <button @click="visible = false" class="ml-auto flex-shrink-0 text-gray-400 hover:text-gray-500">
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
        <!-- End: Dismiss Button -->
    </div>
@endif
<!-- End: Alert Banner -->
