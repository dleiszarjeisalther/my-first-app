<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Models\Category;
use App\Models\Skill;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('throttle:skill-store', only: ['store']),
            new Middleware('throttle:skill-update', only: ['update']),
            new Middleware('throttle:skill-destroy', only: ['destroy']),
            new Middleware('can:update,skill', only: ['edit', 'update']),
            new Middleware('can:delete,skill', only: ['destroy']),
        ];
    }

    public function index()
    {
        $skills = Skill::with('category')->where('user_id', Auth::id())->get();

        return view('skills.index', [
            'user_name' => Auth::user()->name,
            'skills' => $skills,
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('skills.create', compact('categories'));
    }

    public function store(StoreSkillRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = Auth::id();

        Skill::create($validated);

        return redirect()->route('skills.index')->with('success', 'Skill categorized and saved!');
    }

    public function edit(Skill $skill)
    {
        $categoriesopt = Category::all();

        return view('skills.edit', compact('skill', 'categoriesopt'));
    }

    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $validated = $request->validated();

        $skill->update($validated);

        return redirect()->route('skills.index')->with('success', 'Skill updated!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Skill removed.');
    }
}
