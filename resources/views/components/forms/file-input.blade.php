{{--
    WHAT IT IS:
    A styled file upload input.
    It replaces the ugly default browser "Choose File" button with a clean UI.

    HOW IT WORKS:
    - It uses Alpine.js to track when a file is selected.
    - It provides a "Browse" button and displays the filename once picked.
    - It integrates with standard Laravel validation.

    DATA:
    - $name: (string) The input name (e.g., "image").
    - $accept: (string) File types to allow (e.g., "image/*").

    HOW TO CUSTOMIZE:
    - Change the text "Click to upload" to something more specific.
--}}

@props(['name', 'accept' => '*'])

<!-- Start: File Upload Container -->
<div
    x-data="{ fileName: null }"
    class="relative"
>
    <!-- Start: Drag and Drop Dropzone -->
    <div class="flex items-center justify-center w-full">
        <label
            for="{{ $name }}"
            class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition"
        >
            <!-- Start: Dropzone Icon & Prompt -->
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                </svg>
                <p class="mb-2 text-sm text-gray-500">
                    <span class="font-semibold">Click to upload</span> or drag and drop
                </p>
                <p class="text-xs text-gray-400" x-text="fileName ? fileName : '{{ $accept }}'"></p>
            </div>
            <!-- End: Dropzone Icon & Prompt -->

            <!-- Start: Hidden Native File Input -->
            <input
                id="{{ $name }}"
                name="{{ $name }}"
                type="file"
                class="hidden"
                accept="{{ $accept }}"
                @change="fileName = $event.target.files[0].name"
            />
            <!-- End: Hidden Native File Input -->
        </label>
    </div>
    <!-- End: Drag and Drop Dropzone -->
</div>
<!-- End: File Upload Container -->
