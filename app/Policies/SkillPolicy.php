<?php

namespace App\Policies;

use App\Models\Skill;
use App\Models\User;

class SkillPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     * Only the skill's owner may view it.
     */
    public function view(User $user, Skill $skill): bool
    {
        return $user->id === $skill->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     * Only the skill's owner may update it.
     */
    public function update(User $user, Skill $skill): bool
    {
        return $user->id === $skill->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     * Only the skill's owner may delete it.
     */
    public function delete(User $user, Skill $skill): bool
    {
        return $user->id === $skill->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Skill $skill): bool
    {
        return $user->id === $skill->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Skill $skill): bool
    {
        return $user->id === $skill->user_id;
    }
}
