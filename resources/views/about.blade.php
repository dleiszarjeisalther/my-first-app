<!DOCTYPE html>
<html>
<head>
    <title>About Me</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
@if(session('success'))
    <div class="p-3 mb-3 text-green-800 bg-green-100 rounded">
        {{ session('success') }}
    </div>
@endif
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md border-t-4 border-red-500">
        <h1 class="text-3xl font-bold text-gray-800">Hello, {{ $user_name }}!</h1>
        <p class="mt-4 text-gray-600">This page is being served by a Blade template.</p>
        <a href="/" class="mt-6 inline-block text-red-500 hover:underline">← Back to Home</a>
    </div>

    <h2 class="mt-6 font-semibold text-gray-800">My 15-Day Sprint Skills:</h2>
    <ul class="mt-2 space-y-2">
        @foreach($skills as $skill)
    <li class="flex justify-between items-center bg-white p-4 mb-2 shadow rounded">
        <span>🚀 {{ $skill->name }} ({{ $skill->percent }}%)</span>

        <div class="flex space-x-2">
            <a href="/skills/{{ $skill->id }}/edit" class="text-blue-500 text-sm">Edit</a>

            <form action="/skills/{{ $skill->id }}" method="POST" onsubmit="return confirm('Really delete?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 text-sm">Delete</button>
            </form>
        </div>
    </li>
@endforeach
    </ul>
</body>
</html>
