<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Skill; // Don't forget to import your Model!
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        // "with('category')" tells Laravel to fetch all categories in ONE query
        $skills = Skill::with('category')->get();

        return view('skills.index', [
            'user_name' => 'Dleiszar',
            'skills' => $skills
        ]);
    }

    public function create()
    {
        // 2. Fetch all categories so the user can choose one in a dropdown
        $categories = Category::all();
        return view('skills.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // 3. Update validation to ensure a category_id is selected and exists in the DB
        $validated = $request->validate([
            'name' => 'required|min:3',
            'percent' => 'required|integer|min:0|max:100',
            'category_id' => 'required|exists:categories,id',
        ]);

        Skill::create($validated);

        return redirect('/skills')->with('success', 'Skill categorized and saved!');
    }

    public function edit(string $id)
    {
        // Find the specific skill or fail with a 404 error
        $skill = Skill::findOrFail($id);
        $categoriesopt = Category::all();
        return view('skills.edit', compact('skill', 'categoriesopt'));
    }

    public function update(Request $request, string $id)
    {
        $skill = Skill::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|min:3',
            'percent' => 'required|integer|min:0|max:100',
            'category_id' => 'required|exists:categories,id',
        ]);

        $skill->update($validated);

        return redirect('/skills')->with('success', 'Skill updated!');
    }

    public function destroy(string $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect('/skills')->with('success', 'Skill removed.');
    }
}
