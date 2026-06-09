{{--
    WHAT IT IS:
    A custom-styled wrapper for Laravel's built-in pagination links.
    It matches the Tailwind/Indigo theme of the rest of the application.

    HOW IT WORKS:
    - It uses the standard Laravel `$paginator->links()` output but wraps it in a clean container.
    - It ensures consistency between the "Previous/Next" buttons and the numbers.

    DATA:
    - $paginator: (object) The Laravel LengthAwarePaginator instance.

    HOW TO CUSTOMIZE:
    - Add `mt-6` to the attributes to add spacing above the links.
--}}

@props(['paginator'])

@if ($paginator->hasPages())
    <nav {{ $attributes->merge(['class' => 'flex items-center justify-between border-t border-gray-200 px-4 py-3 sm:px-6']) }} aria-label="Pagination">
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    to
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    of
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    results
                </p>
            </div>
            <div>
                {{ $paginator->links() }}
            </div>
        </div>

        {{-- Mobile View --}}
        <div class="flex flex-1 justify-between sm:hidden">
            <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
            <a href="{{ $paginator->nextPageUrl() }}" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
        </div>
    </nav>
@endif
