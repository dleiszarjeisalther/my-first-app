<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

/**
 * CategoryController
 *
 * Handles all CRUD operations for categories.
 *
 * Access model:
 *   - Index / Create / Store: any authenticated user (scoped to their own data).
 *   - Edit / Update / Destroy: only the category owner (enforced via Gate/Policy).
 *
 * NOTE (for Tasks): categories are used as organizational labels when creating tasks.
 * When you build the task feature, you can load this user's categories via:
 *   Category::where('user_id', Auth::id())->get()
 * to pre-populate dropdowns or filter options.
 */
class CategoryController extends Controller implements HasMiddleware
{
    /**
     * Per-route middleware assignments.
     *
     * Throttle limits prevent rapid-fire create/update/delete submissions.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('throttle:category-store', only: ['store']),
            new Middleware('throttle:category-update', only: ['update']),
            new Middleware('throttle:category-destroy', only: ['destroy']),
        ];
    }

    /**
     * Show a list of the current user's categories.
     *
     * Only returns categories owned by the logged-in user — other users'
     * categories are never exposed here.
     */
    public function index()
    {
        // Scope categories to the authenticated user's own records.
        $categories = Category::where('user_id', Auth::id())->get();

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form to create a new category.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Persist a new category owned by the current user.
     *
     * The StoreCategoryRequest validates the input and automatically
     * merges user_id (via prepareForValidation) so ownership is set at save time.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        // user_id is set in StoreCategoryRequest::prepareForValidation()
        Category::create($validated);

        // If the form was submitted from the skill-create flow, send the user back there.
        if ($request->input('redirect_to') === 'skills.create') {
            return redirect()->route('skills.create')->with('success', 'Category created successfully!');
        }

        return redirect()->route('category.index')->with('success', 'Category created successfully!');
    }

    /**
     * Show the detail page for a single category.
     *
     * Enforces ownership: throws 403 if the user doesn't own this category.
     */
    public function show(Category $category)
    {
        Gate::authorize('view', $category);
    }

    /**
     * Show the edit form for a category.
     *
     * Enforces ownership: only the category's creator can access this.
     */
    public function edit(Category $category)
    {
        Gate::authorize('update', $category);

        return view('category.edit', compact('category'));
    }

    /**
     * Apply validated changes to the category.
     *
     * Authorization is handled in UpdateCategoryRequest::authorize().
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();

        $category->fill($validated);
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Delete a category.
     *
     * Enforces ownership: only the category's creator can delete it.
     * Note: any skills under this category will have their category_id set to null.
     */
    public function destroy(Category $category)
    {
        Gate::authorize('delete', $category);

        Category::destroy($category->id);

        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }
}
