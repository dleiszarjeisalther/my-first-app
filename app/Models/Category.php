<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // The bodyguard now knows 'name' is a friend
    protected $fillable = ['name'];

    // The "Spiderweb" connection to Skills
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
