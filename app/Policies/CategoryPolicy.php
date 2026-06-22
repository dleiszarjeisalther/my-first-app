<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;

class CategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     * Users can list their own categories; admins can see all.
     */
    public function viewAny(User $user): bool
    {
        return true;  // Allowed to see the index, but filtered by policy
    }

    /**
     * Determine whether the user can view the model.
     * Only the owner or admins can view a category.
     */
    public function view(User $user, Category $category): bool
    {
        return $user->isAdmin() || $user->id === $category->user_id;
    }

    /**
     * Determine whether the user can create models.
     * Only admins can create categories.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     * Admins or the owner can update categories.
     */
    public function update(User $user, Category $category): bool
    {
        return $user->isAdmin() || $user->id === $category->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     * Admins or the owner can delete categories.
     */
    public function delete(User $user, Category $category): bool
    {
        return $user->isAdmin() || $user->id === $category->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     * Admins or the owner can restore categories.
     */
    public function restore(User $user, Category $category): bool
    {
        return $user->isAdmin() || $user->id === $category->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     * Admins or the owner can permanently delete categories.
     */
    public function forceDelete(User $user, Category $category): bool
    {
        return $user->isAdmin() || $user->id === $category->user_id;
    }
}
