<?php

use App\Models\Category;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertModelExists;
use function Pest\Laravel\assertModelMissing;

test('non-admin user can only see their own categories in index', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();

    Category::factory()->create(['user_id' => $user1->id, 'name' => 'User 1 Category']);
    Category::factory()->create(['user_id' => $user2->id, 'name' => 'User 2 Category']);

    $response = actingAs($user1)->get(route('category.index'));

    $response->assertStatus(200);
    $response->assertSee('User 1 Category');
    $response->assertDontSee('User 2 Category');
});

test('admin user can see all categories in index', function () {
    $admin = User::factory()->create(['email' => 'dleiszarjeisaltherlagariza@gmail.com']);
    $user = User::factory()->create();

    Category::factory()->create(['user_id' => $user->id, 'name' => 'User Category']);
    Category::factory()->create(['user_id' => $admin->id, 'name' => 'Admin Category']);

    $response = actingAs($admin)->get(route('category.index'));

    $response->assertStatus(200);
    $response->assertSee('User Category');
    $response->assertSee('Admin Category');
});

test('non-admin cannot create category', function () {
    $user = User::factory()->create();

    $response = actingAs($user)->post(route('category.store'), [
        'name' => 'New Category',
    ]);

    $response->assertStatus(403);
});

test('admin can create category', function () {
    $admin = User::factory()->create(['email' => 'dleiszarjeisaltherlagariza@gmail.com']);

    $response = actingAs($admin)->post(route('category.store'), [
        'name' => 'New Admin Category',
    ]);

    $response->assertRedirect(route('category.index'));
    assertDatabaseHas('categories', [
        'name' => 'New Admin Category',
        'user_id' => $admin->id,
    ]);
});

test('non-owner cannot edit others category', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    $response = actingAs($other)->get(route('category.edit', $category));

    $response->assertStatus(403);
});

test('owner can edit their own category', function () {
    $owner = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    $response = actingAs($owner)->get(route('category.edit', $category));

    $response->assertStatus(200);
    $response->assertSee($category->name);
});

test('admin can edit any category', function () {
    $admin = User::factory()->create(['email' => 'dleiszarjeisaltherlagariza@gmail.com']);
    $user = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $user->id]);

    $response = actingAs($admin)->get(route('category.edit', $category));

    $response->assertStatus(200);
});

test('non-owner cannot update others category', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    $response = actingAs($other)->put(route('category.update', $category), [
        'name' => 'Updated Name',
    ]);

    $response->assertStatus(403);
});

test('owner can update their own category', function () {
    $owner = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id, 'name' => 'Original']);

    $response = actingAs($owner)->put(route('category.update', $category), [
        'name' => 'Updated',
    ]);

    $response->assertRedirect(route('category.index'));
    assertDatabaseHas('categories', [
        'id' => $category->id,
        'name' => 'Updated',
    ]);
});

test('non-owner cannot delete others category', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    $response = actingAs($other)->delete(route('category.destroy', $category));

    $response->assertStatus(403);
    assertModelExists($category);
});

test('owner can delete their own category', function () {
    $owner = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    $response = actingAs($owner)->delete(route('category.destroy', $category));

    $response->assertRedirect(route('category.index'));
    assertModelMissing($category);
});

test('admin can delete any category', function () {
    $admin = User::factory()->create(['email' => 'dleiszarjeisaltherlagariza@gmail.com']);
    $user = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $user->id]);

    $response = actingAs($admin)->delete(route('category.destroy', $category));

    $response->assertRedirect(route('category.index'));
    assertModelMissing($category);
});
