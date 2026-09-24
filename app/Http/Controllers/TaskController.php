<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();

        return view('homepage.index', compact('tasks'));
    }

    public function create()
    {
        return view('create-task.index');
    }

    public function store(Request $request)
{
    $request->validate([
        'task_name' => 'required|max:255',
        'description' => 'nullable',
        'due_date' => 'nullable|date',
    ]);

    Task::create([
        'task_name' => $request->task_name,
        'description' => $request->description,
        'status' => 'Pending',
        'due_date' => $request->due_date,
    ]);

    return redirect()->route('tasks.index')
        ->with('success', 'Task added successfully!');
}

public function complete(Task $task)
{
    $task->update([
        'status' => 'Completed',
    ]);

    return redirect()->route('tasks.index')
        ->with('success', 'Task completed!');
}

    public function show(Task $task)
    {
        return view('view-task.index', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('edit-task.index', compact('task'));
    }

    public function update(Request $request, Task $task)
{
    $request->validate([
        'task_name' => 'required|max:255',
        'description' => 'nullable',
        'due_date' => 'nullable|date',
    ]);

    $task->update([
        'task_name' => $request->task_name,
        'description' => $request->description,
        'due_date' => $request->due_date,
    ]);

    return redirect()->route('tasks.index')
        ->with('success', 'Task updated successfully!');
}

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully!');
    }
}