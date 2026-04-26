<?php

namespace App\Http\Controllers;

use App\Models\Skill; // Don't forget to import your Model!
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();

        return view('about', [
            'user_name' => 'Dleiszar',
            'skills' => $skills
        ]);
    }
}