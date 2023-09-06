<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        return view('task.home');
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
}
