<?php

use App\Models\Category;
use App\Models\User;

/**
 * CategoryAuthorizationTest
 *
 * Verifies that CategoryPolicy correctly gates access by ownership.
 *
 * Rule: only the owner of a category may view/edit/delete it.
 * Any authenticated user may create or list categories.
 */
test('owner can view their own category', function () {
    $owner = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    expect($owner->can('view', $category))->toBeTrue();
});

test('non-owner cannot view another user\'s category', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    expect($other->can('view', $category))->toBeFalse();
});

test('any authenticated user can view any categories (index)', function () {
    $user = User::factory()->create();

    expect($user->can('viewAny', Category::class))->toBeTrue();
});

test('any authenticated user can create a category', function () {
    $user = User::factory()->create();

    expect($user->can('create', Category::class))->toBeTrue();
});

test('owner can update their own category', function () {
    $owner = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    expect($owner->can('update', $category))->toBeTrue();
});

test('non-owner cannot update another user\'s category', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    expect($other->can('update', $category))->toBeFalse();
});

test('owner can delete their own category', function () {
    $owner = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    expect($owner->can('delete', $category))->toBeTrue();
});

test('non-owner cannot delete another user\'s category', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    expect($other->can('delete', $category))->toBeFalse();
});
