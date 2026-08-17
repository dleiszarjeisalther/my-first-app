<?php

use App\Models\Task;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;

test('task owner can update their task', function () {
    $owner = User::factory()->create(['email_verified_at' => now()]);
    $task = Task::create([
        'name' => 'Original task',
        'done' => false,
        'user_id' => $owner->id,
    ]);

    actingAs($owner)
        ->put(route('tasks.update', $task), ['name' => 'Updated task'])
        ->assertRedirect(route('tasks.index'));

    assertDatabaseHas('tasks', ['id' => $task->id, 'name' => 'Updated task']);
});

test('non-owner cannot update another user task', function () {
    $owner = User::factory()->create(['email_verified_at' => now()]);
    $other = User::factory()->create(['email_verified_at' => now()]);
    $task = Task::create([
        'name' => 'Original task',
        'done' => false,
        'user_id' => $owner->id,
    ]);

    actingAs($other)
        ->put(route('tasks.update', $task), ['name' => 'Hacked task'])
        ->assertForbidden();

    assertDatabaseHas('tasks', ['id' => $task->id, 'name' => 'Original task']);
});
