<?php

namespace App\Policies;

use App\Models\Skill;
use App\Models\User;

/**
 * SkillPolicy
 *
 * Controls who can perform CRUD actions on Skill models.
 *
 * Access rule: only the user who created a skill can view, edit, or delete it.
 * Any authenticated user can create new skills.
 *
 * NOTE (for Tasks): skills are referenced when building tasks — e.g. a task may be
 * associated with a skill to track which competency it develops. Ensure user_id
 * scoping here stays consistent with how tasks read skills.
 */
class SkillPolicy
{
    /**
     * Any authenticated user can visit the skill index.
     *
     * The controller scopes the query to return only the current user's skills,
     * so listing is always safe.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Only the skill's owner may view its detail.
     */
    public function view(User $user, Skill $skill): bool
    {
        return $user->id === $skill->user_id;
    }

    /**
     * Any authenticated user can create a skill.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Only the skill's owner may edit it.
     */
    public function update(User $user, Skill $skill): bool
    {
        return $user->id === $skill->user_id;
    }

    /**
     * Only the skill's owner may delete it.
     */
    public function delete(User $user, Skill $skill): bool
    {
        return $user->id === $skill->user_id;
    }

    /**
     * Only the skill's owner may restore a soft-deleted skill.
     */
    public function restore(User $user, Skill $skill): bool
    {
        return $user->id === $skill->user_id;
    }

    /**
     * Only the skill's owner may permanently delete it.
     */
    public function forceDelete(User $user, Skill $skill): bool
    {
        return $user->id === $skill->user_id;
    }
}
