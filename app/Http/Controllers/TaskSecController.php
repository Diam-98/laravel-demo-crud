<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskSecController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('task.home', ['tasks' => Task::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $request->validated($request->all());

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'isCompleted' => $request->isCompleted  == 'on' ? 1 : 0
        ]);

        return redirect()->route('home')->with('success', 'Tache ajoute avec succes');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('task.create', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $request->validated($request->all());

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'isCompleted' => $request->isCompleted  == 'on' ? 1 : 0
        ]);

        return redirect()->route('home')->with('success', 'Tache modifiee avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('home')->with('success', 'Tache suprime avec success');
    }
}
