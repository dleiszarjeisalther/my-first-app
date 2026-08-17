<?php

use App\Models\Category;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertModelExists;
use function Pest\Laravel\assertModelMissing;

/**
 * CategoryControllerTest
 *
 * Verifies that CategoryController enforces owner-based access:
 *  - Index: only the authenticated user's own categories are shown.
 *  - Create/Store: any authenticated user can add categories.
 *  - Edit/Update/Destroy: only the owner can modify or delete.
 */
test('unauthenticated user is redirected from category index', function () {
    $this->get(route('category.index'))->assertRedirect(route('login'));
});

test('user only sees their own categories in index', function () {
    $user = User::factory()->create();
    $other = User::factory()->create();

    $mine = Category::factory()->create(['user_id' => $user->id, 'name' => 'My Category']);
    Category::factory()->create(['user_id' => $other->id, 'name' => 'Other Category']);

    actingAs($user)->get(route('category.index'))
        ->assertStatus(200)
        ->assertSee('My Category')
        ->assertDontSee('Other Category');
});

test('authenticated user can view category create page', function () {
    $user = User::factory()->create();

    actingAs($user)->get(route('category.create'))->assertStatus(200);
});

test('authenticated user can create a category owned by themselves', function () {
    $user = User::factory()->create();

    actingAs($user)->post(route('category.store'), ['name' => 'New Skill Area'])
        ->assertRedirect(route('category.index'));

    assertDatabaseHas('categories', [
        'name' => 'New Skill Area',
        'user_id' => $user->id, // ownership is set server-side
    ]);
});

test('different users can create categories with the same name', function () {
    $firstUser = User::factory()->create();
    $secondUser = User::factory()->create();

    actingAs($firstUser)->post(route('category.store'), ['name' => 'Backend'])
        ->assertRedirect(route('category.index'));

    actingAs($secondUser)->post(route('category.store'), ['name' => 'Backend'])
        ->assertRedirect(route('category.index'));

    expect(Category::where('name', 'Backend')->count())->toBe(2);
});

test('a user cannot create duplicate category names', function () {
    $user = User::factory()->create();
    Category::factory()->create(['user_id' => $user->id, 'name' => 'Backend']);

    actingAs($user)->post(route('category.store'), ['name' => 'Backend'])
        ->assertSessionHasErrors('name');
});

test('owner can edit their own category', function () {
    $owner = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    actingAs($owner)->get(route('category.edit', $category))
        ->assertStatus(200)
        ->assertSee($category->name);
});

test('non-owner cannot access edit form for another user\'s category', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    actingAs($other)->get(route('category.edit', $category))->assertStatus(403);
});

test('owner can update their own category', function () {
    $owner = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id, 'name' => 'Old Name']);

    actingAs($owner)->put(route('category.update', $category), ['name' => 'New Name'])
        ->assertRedirect(route('category.index'));

    assertDatabaseHas('categories', ['id' => $category->id, 'name' => 'New Name']);
});

test('non-owner cannot update another user\'s category', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id, 'name' => 'Original']);

    actingAs($other)->put(route('category.update', $category), ['name' => 'Hacked'])
        ->assertStatus(403);

    assertModelExists($category);
});

test('owner can delete their own category', function () {
    $owner = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    actingAs($owner)->delete(route('category.destroy', $category))
        ->assertRedirect(route('category.index'));

    assertModelMissing($category);
});

test('non-owner cannot delete another user\'s category', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    actingAs($other)->delete(route('category.destroy', $category))->assertStatus(403);

    assertModelExists($category);
});
