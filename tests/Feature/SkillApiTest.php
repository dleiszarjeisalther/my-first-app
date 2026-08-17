<?php

use App\Models\Category;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('public can list skills via api', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create();
    Skill::factory()->count(3)->create([
        'user_id' => $user->id,
        'category_id' => $category->id,
    ]);

    $response = $this->getJson('/api/skills');

    $response->assertStatus(200)
        ->assertJsonStructure([
            'status',
            'data' => [
                '*' => ['id', 'name', 'percent', 'category', 'created_at'],
            ],
        ]);
});

test('public can create skill via api', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $payload = [
        'name' => 'Laravel API Testing',
        'percent' => 95,
        'category_id' => $category->id,
    ];

    $response = $this->postJson('/api/skills', $payload);

    $response->assertStatus(201)
        ->assertJsonPath('status', 'success')
        ->assertJsonPath('data.name', 'Laravel API Testing');

    $this->assertDatabaseHas('skills', [
        'name' => 'Laravel API Testing',
        'percent' => 95,
    ]);
});

test('public can view single skill via api', function () {
    $user = User::factory()->create();
    $skill = Skill::factory()->create(['user_id' => $user->id]);

    $response = $this->getJson("/api/skills/{$skill->id}");

    $response->assertStatus(200)
        ->assertJsonPath('status', 'success')
        ->assertJsonPath('data.id', $skill->id);
});

test('public can update skill via api', function () {
    $user = User::factory()->create();
    $skill = Skill::factory()->create(['user_id' => $user->id, 'percent' => 50]);

    $response = $this->putJson("/api/skills/{$skill->id}", [
        'percent' => 85,
    ]);

    $response->assertStatus(200)
        ->assertJsonPath('status', 'success')
        ->assertJsonPath('data.percent', 85);

    $this->assertDatabaseHas('skills', [
        'id' => $skill->id,
        'percent' => 85,
    ]);
});

test('public can delete skill via api', function () {
    $user = User::factory()->create();
    $skill = Skill::factory()->create(['user_id' => $user->id]);

    $response = $this->deleteJson("/api/skills/{$skill->id}");

    $response->assertStatus(200)
        ->assertJsonPath('status', 'success');

    $this->assertDatabaseMissing('skills', [
        'id' => $skill->id,
    ]);
});
