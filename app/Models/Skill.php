<?php

namespace App\Models;

use Database\Factories\SkillFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Skill Model
 *
 * A skill represents a specific competency a user has, with a self-assessed
 * mastery percentage (0–100). Skills are organized under a category.
 *
 * Ownership: each skill belongs to the user who created it.
 * Users can only view, edit, and delete their own skills.
 *
 * Relationship chain:
 *   User → has many Skills → each Skill belongs to one Category
 *
 * NOTE (for Tasks): Skills and their categories serve as a reference guide
 * when creating tasks. For example, a task can be linked to a category to
 * indicate which type of skill it's meant to build or practice.
 * The task system will read from these skills/categories — do not remove
 * the relationships without updating the task feature too.
 */
class Skill extends Model
{
    /** @use HasFactory<SkillFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * - name:        the skill label (e.g. "Laravel", "Figma")
     * - percent:     mastery level from 0 (none) to 100 (expert)
     * - category_id: groups this skill under a category
     * - user_id:     the owner; only this user can manage the skill
     * - image:       optional image path for a skill icon/thumbnail
     */
    protected $fillable = [
        'name',
        'percent',
        'category_id',
        'user_id',
        'image',
    ];

    // ─────────────────────────────────────────────
    // Relationships
    // ─────────────────────────────────────────────

    /**
     * The category this skill is grouped under.
     *
     * Used to organize skills and for task template references.
     * Returns null if no category is assigned.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The user who created (and owns) this skill.
     *
     * Used for ownership checks in SkillPolicy.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
