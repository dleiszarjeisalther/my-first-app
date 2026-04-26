<?php

namespace App\Http\Controllers;

use App\Models\Skill; // Don't forget to import your Model!
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();

        return view('about', [
            'user_name' => 'Dleiszar',
            'skills' => $skills
        ]);
    }

    public function create()
    {
        // Just show the form
        return view('skills.create');
    }

    public function store(Request $request)
    {
        // 1. Validate: Don't trust the user! Make sure they actually typed a name.
        $validated = $request->validate([
            'name' => 'required|min:3',
            'percent' => 'required|integer|min:0|max:100',
        ]);

        // 2. Save to Warehouse
        Skill::create($validated);

        // 3. Go back to the list with a "Success" message
        return redirect('/about')->with('success', 'Skill added successfully!');
    }
}
