<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Models\Category;
use App\Models\Skill;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

/**
 * SkillController
 *
 * Handles all CRUD operations for skills.
 *
 * Access model:
 *   - Index / Create / Store: any authenticated user (scoped to their own data).
 *   - Edit / Update / Destroy: only the skill owner (enforced via policy middleware).
 *
 * NOTE (for Tasks): when building the task feature, use skills as a reference to
 * understand what a user wants to practice. For example:
 *   - Use $skill->category to know the skill domain.
 *   - Use $skill->percent to gauge current mastery level.
 *   - Filter skills by category to suggest relevant tasks:
 *       Skill::where('user_id', Auth::id())->where('category_id', $categoryId)->get()
 */
class SkillController extends Controller implements HasMiddleware
{
    /**
     * Per-route middleware assignments.
     *
     * - can:update,skill — the 'update' and 'edit' routes require ownership.
     * - can:delete,skill — the 'destroy' route requires ownership.
     * - throttle limits prevent rapid create/update/delete submissions.
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

    /**
     * Show a list of the current user's skills.
     *
     * Eager-loads 'category' to avoid N+1 queries when rendering skill cards.
     * Only returns skills owned by the logged-in user.
     */
    public function index()
    {
        // Scope to the authenticated user; eager-load category for display.
        $skills = Skill::with('category')
            ->where('user_id', Auth::id())
            ->get();

        return view('skills.index', [
            'user_name' => Auth::user()->name,
            'skills' => $skills,
        ]);
    }

    /**
     * Show the form to create a new skill.
     *
     * Loads only the current user's categories so they can only group a skill
     * under a category they own.
     *
     * NOTE (for Tasks): this same category list is what you'd use in the
     * task-create form to let users pick a relevant skill domain.
     */
    public function create()
    {
        // Only show the user's own categories in the dropdown.
        $categories = Category::where('user_id', Auth::id())->get();

        return view('skills.create', compact('categories'));
    }

    /**
     * Persist a new skill owned by the current user.
     *
     * user_id is injected here (not from the form) to ensure users can't
     * assign skills to other accounts via request tampering.
     */
    public function store(StoreSkillRequest $request)
    {
        $validated = $request->validated();

        // Attach the authenticated user as owner — never trust user_id from the form.
        $validated['user_id'] = Auth::id();

        Skill::create($validated);

        return redirect()->route('skills.index')->with('success', 'Skill categorized and saved!');
    }

    /**
     * Show the edit form for a skill.
     *
     * Ownership is already enforced by the 'can:update,skill' middleware above.
     * Loads only the current user's categories for the category dropdown.
     */
    public function edit(Skill $skill)
    {
        // Only show the user's own categories in the edit dropdown.
        $categoriesopt = Category::where('user_id', Auth::id())->get();

        return view('skills.edit', compact('skill', 'categoriesopt'));
    }

    /**
     * Apply validated changes to the skill.
     *
     * Ownership is already enforced by the 'can:update,skill' middleware.
     * Authorization is also checked in UpdateSkillRequest::authorize().
     */
    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $validated = $request->validated();

        $skill->update($validated);

        return redirect()->route('skills.index')->with('success', 'Skill updated!');
    }

    /**
     * Delete a skill.
     *
     * Ownership is already enforced by the 'can:delete,skill' middleware above.
     * NOTE (for Tasks): if tasks reference this skill's ID, handle the cleanup
     * there (e.g. set skill_id to null or cascade delete) before removing here.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Skill removed.');
    }
}
