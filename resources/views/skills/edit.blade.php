<form action="/skills/{{ $skill->id }}" method="POST">
    @csrf
    @method('PATCH') <div class="mb-4">
        <label class="block">Skill Name</label>
        <input type="text" name="name" value="{{ $skill->name }}" class="border p-2 w-full">
    </div>

    <div class="mb-4">
        <label class="block">Mastery (%)</label>
        <input type="number" name="percent" value="{{ $skill->percent }}" class="border p-2 w-full">
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Skill</button>
</form>
