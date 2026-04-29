<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My Laravel App' }}</title>
    
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">

    <nav class="bg-white shadow mb-8 p-4">
        <div class="max-w-4xl mx-auto flex justify-between">
            <a href="/" class="font-bold text-red-500">SprintApp</a>
            <div class="space-x-4">
                <a href="/about" class="text-gray-600 hover:text-red-500">Skills</a>
                <a href="/skills/create" class="text-gray-600 hover:text-red-500">+ Add Skill</a>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4">
        @yield('content')
    </main>
     @vite(['resources/js/app.js'])
</body>
</html>
