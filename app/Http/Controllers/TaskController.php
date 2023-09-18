<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        return view('task.home', ['tasks' => Task::all()]);
    }

    public function create(){
        return view('task.create');
    }

    public function store(Request $request){

        $request->validate([
           'title' => 'string|max:255|required',
           'description' => 'string|max:1000|required',
        ]);

//        dd($request->isCompleted);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'isCompleted' => $request->isCompleted  == 'on' ? 1 : 0
        ]);

        return redirect()->route('home')->with('success', 'Tache ajoute avec succes');
    }

    public function edit(int $id){
        $task = Task::where('id', $id)->first();
        return view('task.create', compact('task'));
    }

    public function update(Request $request, int $id){
        $request->validate([
            'title' => 'string|max:255|required',
            'description' => 'string|max:1000|required',
        ]);

        $task = Task::where('id', $id)->first();

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'isCompleted' => $request->isCompleted == 'on' ? 1 : 0
        ]);

        return redirect()->route('home')->with('success', 'Tache modifiee avec success');
    }

    public function destroy(int $id){
        $task = Task::where('id', $id)->first();
        $task->delete();
        return redirect()->route('home')->with('success', 'Tache suprime avec success');
    }
}
