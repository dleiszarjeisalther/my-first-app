<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<CategoryFactory> */
    use HasFactory;

    // The bodyguard now knows 'name' and 'user_id' are friends
    protected $fillable = ['name', 'user_id'];

    // The user who created this category
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // The "Spiderweb" connection to Skills
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
