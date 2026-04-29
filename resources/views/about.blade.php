@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Hello, {{ $user_name }}!</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <ul class="mt-2 space-y-2">
        @foreach($skills as $skill)
            <li class="flex justify-between items-center bg-white p-4 shadow rounded border-l-4 border-red-500">
                <div>
                    <span class="font-bold text-gray-800">🚀 {{ $skill->name }}</span>
                    <span class="ml-2 text-xs bg-gray-200 text-gray-600 px-2 py-1 rounded-full uppercase">
                        {{ $skill->category->name }}
                    </span>
                </div>

                <div class="flex items-center space-x-4">
                    <span class="font-bold text-red-500">{{ $skill->percent }}%</span>
                    <a href="/skills/{{ $skill->id }}/edit" class="text-blue-500 hover:underline">Edit</a>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
