<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Auth::user()->tasks()->latest()->get();
        // Update view name from 'task.index' to 'tasks.index'
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Update view name from 'task.create' to 'tasks.create'
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Auth::user()->tasks()->create([
            'title' => $request->title,
            'status' => 'pending'
        ]);

        // Update route name from 'task.index' to 'tasks.index'
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        
        if (Auth::user()->id !== $task->user_id) {
            return redirect()->route('tasks.index')->with('error', 'Unauthorized action.');
        }
        
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        
        if (Auth::user()->id !== $task->user_id) {
            return redirect()->route('tasks.index')->with('error', 'Unauthorized action.');
        }
        
        $request->validate([
            'title' => 'required|max:255',
        ]);
        
        $task->update([
            'title' => $request->title
        ]);
        
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        
        if (Auth::user()->id !== $task->user_id) {
            // Update route name from 'task.index' to 'tasks.index'
            return redirect()->route('tasks.index')->with('error', 'Unauthorized action.');
        }

        $task->delete();

        // Update route name from 'task.index' to 'tasks.index'
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
    
    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(string $id)
    {
        $task = Task::findOrFail($id);
        
        if (Auth::user()->id !== $task->user_id) {
            return redirect()->route('tasks.index')->with('error', 'Unauthorized action.');
        }
        
        $task->update([
            'status' => $task->status === 'pending' ? 'completed' : 'pending'
        ]);
        
        return redirect()->route('tasks.index')->with('success', 'Task status updated successfully.');
    }
}
