{{--
    WHAT IT IS:
    The Table component provides a standardized, responsive wrapper for data lists.
    It handles overflow on small screens and provides consistent typography.

    HOW IT WORKS:
    - It uses `overflow-x-auto` to allow horizontal scrolling on mobile.
    - It provides a `header` slot for `<thead>` content.
    - The main `slot` is used for the `<tbody>` rows.

    DATA:
    - $header: (slot) The header row(s).
    - $slot:   (slot) The body row(s).

    HOW TO CUSTOMIZE:
    - Add `divide-y divide-gray-200` to the `tbody` for row separators.
    - Use `whitespace-nowrap` on `<td>` elements to prevent text wrapping.
--}}

<div {{ $attributes->merge(['class' => 'flex flex-col']) }}>
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        {{ $header }}
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        {{ $slot }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
