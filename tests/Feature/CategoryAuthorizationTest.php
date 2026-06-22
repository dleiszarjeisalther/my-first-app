<?php

use App\Models\Category;
use App\Models\User;

test('admin can view any categories', function () {
    $admin = User::factory()->create(['email' => 'dleiszarjeisaltherlagariza@gmail.com']);

    $response = $admin->can('viewAny', Category::class);

    expect($response)->toBeTrue();
});

test('non-admin can view any categories', function () {
    $user = User::factory()->create();

    $response = $user->can('viewAny', Category::class);

    expect($response)->toBeTrue();
});

test('non-admin cannot view others category', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $user1->id]);

    $response = $user2->can('view', $category);

    expect($response)->toBeFalse();
});

test('owner can view their own category', function () {
    $owner = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    $response = $owner->can('view', $category);

    expect($response)->toBeTrue();
});

test('admin can view any category', function () {
    $admin = User::factory()->create(['email' => 'dleiszarjeisaltherlagariza@gmail.com']);
    $otherUser = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $otherUser->id]);

    $response = $admin->can('view', $category);

    expect($response)->toBeTrue();
});

test('admin can create categories', function () {
    $admin = User::factory()->create(['email' => 'dleiszarjeisaltherlagariza@gmail.com']);

    $response = $admin->can('create', Category::class);

    expect($response)->toBeTrue();
});

test('non-admin cannot create categories', function () {
    $user = User::factory()->create();

    $response = $user->can('create', Category::class);

    expect($response)->toBeFalse();
});

test('admin can update any category', function () {
    $admin = User::factory()->create(['email' => 'dleiszarjeisaltherlagariza@gmail.com']);
    $category = Category::factory()->create(['user_id' => 1]);

    $response = $admin->can('update', $category);

    expect($response)->toBeTrue();
});

test('owner can update their own category', function () {
    $owner = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    $response = $owner->can('update', $category);

    expect($response)->toBeTrue();
});

test('non-owner cannot update others category', function () {
    $owner = User::factory()->create();
    $otherUser = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    $response = $otherUser->can('update', $category);

    expect($response)->toBeFalse();
});

test('admin can delete any category', function () {
    $admin = User::factory()->create(['email' => 'dleiszarjeisaltherlagariza@gmail.com']);
    $category = Category::factory()->create(['user_id' => 1]);

    $response = $admin->can('delete', $category);

    expect($response)->toBeTrue();
});

test('owner can delete their own category', function () {
    $owner = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    $response = $owner->can('delete', $category);

    expect($response)->toBeTrue();
});

test('non-owner cannot delete others category', function () {
    $owner = User::factory()->create();
    $otherUser = User::factory()->create();
    $category = Category::factory()->create(['user_id' => $owner->id]);

    $response = $otherUser->can('delete', $category);

    expect($response)->toBeFalse();
});
