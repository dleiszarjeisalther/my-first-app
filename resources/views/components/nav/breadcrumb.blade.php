{{--
    WHAT IT IS:
    A secondary navigation trail that helps users understand where they are.
    Example: Dashboard > Skills > Edit Skill.

    HOW IT WORKS:
    - It takes an array of `:items` (name => url).
    - It automatically adds the "/" separator between items.
    - The last item is automatically styled as the "current" page (non-clickable).

    DATA:
    - $items: (array) key => url array (e.g., ['Dashboard' => '/dashboard']).

    HOW TO CUSTOMIZE:
    - Replace the ">" icon with a "/" or an SVG arrow.
--}}

@props(['items' => []])

<nav class="flex mb-4" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        @foreach ($items as $label => $url)
            <li class="inline-flex items-center">
                @if (!$loop->first)
                    <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                @endif

                @if ($loop->last)
                    <span class="text-sm font-medium text-gray-500 md:ml-2">{{ $label }}</span>
                @else
                    <a href="{{ $url }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600">
                        {{ $label }}
                    </a>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
