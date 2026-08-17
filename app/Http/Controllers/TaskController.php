<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTasksRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $names = Task::where('user_id', Auth::id())->get();

        return view('tasks.index', [
            'user_name' => Auth::user()->name,
            'names' => $names,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tasks = Task::where('user_id', Auth::id())->get();

        return view('tasks.create', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();

        // Attach the authenticated user as owner — never trust user_id from the form.
        $validated['user_id'] = Auth::id();

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Skill categorized and saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTasksRequest $request, Task $task)
    {
        $validated = $request->validated();
        // dd($validated);
        $task->fill($validated);
        $task->save();

        // ✅ Added by AI: return to the task index after a successful task update.
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        Gate::authorize('delete', $task);

        Task::destroy($task->id);

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
