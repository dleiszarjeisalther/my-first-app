<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SkillApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $skills = Skill::with('category')->get();

        return response()->json([
            'status' => 'success',
            'data' => SkillResource::collection($skills),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'percent' => 'required|integer|min:0|max:100',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $defaultUser = User::first();

        $validated['user_id'] = $request->user()?->id ?? $defaultUser?->id ?? 1;

        $skill = Skill::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => new SkillResource($skill),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => new SkillResource($skill->load('category')),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|min:3|max:255',
            'percent' => 'sometimes|required|integer|min:0|max:100',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $skill->update($validated);

        return response()->json([
            'status' => 'success',
            'data' => new SkillResource($skill),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill): JsonResponse
    {
        $skill->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Skill deleted successfully.',
        ], 200);
    }
}
