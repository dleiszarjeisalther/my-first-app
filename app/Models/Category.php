<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Category Model
 *
 * A category is a label that groups related skills together
 * (e.g. "Backend", "Frontend", "Design").
 *
 * Ownership: each category belongs to the user who created it.
 * Users can only view, edit, and delete their own categories.
 *
 * Relationship chain:
 *   User → has many Categories → each Category has many Skills
 *
 * NOTE (for Tasks): When building a task, you can reference a category
 * to pre-fill or filter skills. The category acts as a template organizer.
 */
class Category extends Model
{
    /** @use HasFactory<CategoryFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * - name: the display label for the category (e.g. "Backend")
     * - user_id: the ID of the user who owns this category
     */
    protected $fillable = ['name', 'user_id'];

    // ─────────────────────────────────────────────
    // Relationships
    // ─────────────────────────────────────────────

    /**
     * The user who created (and owns) this category.
     *
     * Used for ownership checks in CategoryPolicy.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * All skills that belong to this category.
     *
     * When iterating skills for a task, you can call:
     *   $category->skills  →  collection of Skill models
     */
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }
}
