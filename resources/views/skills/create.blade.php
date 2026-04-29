@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Add a New Skill</h1>
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="/skills" method="POST">
            @csrf <div class="mb-4">
                <label class="block text-gray-700">Skill Name</label>
                <input type="text" name="name" class="w-full border p-2 rounded" placeholder="e.g. Laravel" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Mastery (%)</label>
                <input type="number" name="percent" class="w-full border p-2 rounded" placeholder="e.g. 85" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Category</label>
                <select name="category_id" class="w-full border p-2 rounded shadow-sm focus:border-red-500 outline-none" required>
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Save Skill
            </button>
        </form>
    </div>
@endsection
