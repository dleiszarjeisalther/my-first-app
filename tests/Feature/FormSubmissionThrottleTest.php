<?php

use App\Models\Category;
use App\Models\User;

test('category store succeeds on first submission', function () {
    $user = User::factory()->create(['email' => 'dleiszarjeisaltherlagariza@gmail.com']);

    $response = $this->actingAs($user)->post(route('category.store'), [
        'name' => 'Design',
    ]);

    $response->assertRedirect(route('category.index'));
    $this->assertDatabaseHas('categories', ['name' => 'Design']);
});

test('category store is throttled on rapid duplicate submissions', function () {
    $user = User::factory()->create(['email' => 'dleiszarjeisaltherlagariza@gmail.com']);

    $this->actingAs($user)->post(route('category.store'), [
        'name' => 'Design',
    ])->assertRedirect();

    $response = $this->actingAs($user)->post(route('category.store'), [
        'name' => 'Development',
    ]);

    $response->assertStatus(429);
});

test('skill store succeeds on first submission', function () {
    $user = User::factory()->create();
    $category = Category::create(['name' => 'Backend', 'user_id' => $user->id]);

    $response = $this->actingAs($user)->post(route('skills.store'), [
        'name' => 'Laravel',
        'percent' => 85,
        'category_id' => $category->id,
    ]);

    $response->assertRedirect(route('skills.index'));
    $this->assertDatabaseHas('skills', [
        'name' => 'Laravel',
        'user_id' => $user->id,
    ]);
});

test('skill store is throttled on rapid duplicate submissions', function () {
    $user = User::factory()->create();
    $category = Category::create(['name' => 'Backend', 'user_id' => $user->id]);

    $this->actingAs($user)->post(route('skills.store'), [
        'name' => 'Laravel',
        'percent' => 85,
        'category_id' => $category->id,
    ])->assertRedirect();

    $response = $this->actingAs($user)->post(route('skills.store'), [
        'name' => 'PHP',
        'percent' => 90,
        'category_id' => $category->id,
    ]);

    $response->assertStatus(429);
});
