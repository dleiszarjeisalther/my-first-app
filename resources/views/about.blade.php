<!DOCTYPE html>
<html>
<head>
    <title>About Me</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md border-t-4 border-red-500">
        <h1 class="text-3xl font-bold text-gray-800">Hello, {{ $user_name }}!</h1>
        <p class="mt-4 text-gray-600">This page is being served by a Blade template.</p>
        <a href="/" class="mt-6 inline-block text-red-500 hover:underline">← Back to Home</a>
    </div>

    <h2 class="mt-6 font-semibold text-gray-800">My 15-Day Sprint Skills:</h2>
    <ul class="mt-2 space-y-2">
        @foreach($skills as $skill)
        <li class="bg-red-50 text-red-700 px-4 py-2 rounded-md border border-red-100 flex justify-between">
            <span>🚀 {{ $skill->name }}</span>
            
            <span class="font-bold text-red-400">{{ $skill->percent }}%</span>
        </li>
    @endforeach
    </ul>
</body>
</html>
