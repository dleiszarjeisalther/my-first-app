<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;

/**
 * CategoryPolicy
 *
 * Controls who can perform CRUD actions on Category models.
 *
 * Access rule: only the user who created a category can view, edit, or delete it.
 * Any authenticated user can create new categories.
 *
 * NOTE (for Tasks): categories are shared as reference data when linking tasks to
 * skill areas. The viewAny check (index page) is kept open so the category list can
 * be used as a dropdown in task creation even if owned by others in the future.
 */
class CategoryPolicy
{
    /**
     * Any authenticated user can visit the category index.
     *
     * The controller further scopes the query to only return
     * the user's own categories, so nothing leaks here.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Only the category owner can view the detail page.
     */
    public function view(User $user, Category $category): bool
    {
        return $user->id === $category->user_id;
    }

    /**
     * Any authenticated user can create a category.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Only the category owner can edit it.
     */
    public function update(User $user, Category $category): bool
    {
        return $user->id === $category->user_id;
    }

    /**
     * Only the category owner can delete it.
     */
    public function delete(User $user, Category $category): bool
    {
        return $user->id === $category->user_id;
    }

    /**
     * Only the category owner can restore a soft-deleted category.
     */
    public function restore(User $user, Category $category): bool
    {
        return $user->id === $category->user_id;
    }

    /**
     * Only the category owner can permanently delete it.
     */
    public function forceDelete(User $user, Category $category): bool
    {
        return $user->id === $category->user_id;
    }
}
