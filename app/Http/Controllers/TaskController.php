<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
       $task = Task::all();
        return view('tasks.index', ['tasks' => $task]);
    }

    public function create(){
        // Logic to show the form for creating a new task
        return view('tasks.create');
    }
        
    public function store(Request $request){
        $request -> validate([
            'title' => 'required'
        ]);

        Task::create($request->only('title'));

        return redirect()->route('tasks.index');
    }

    public function show(Task $task){
        return view('tasks.show', ['task'=> $task]);        
    }

    public function edit(Task $task){
        return view('tasks.edit', compact('task'));
    }
    
    public function update(Request $request, $id){
        $task = Task::findOrFail ($id);

        $task -> update([
            'title' => $request->input('title'),
            'is_done' => $request->input('is_done', false),
        ]);

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task){
            $task->delete();
            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
        }

    public function done(Task $task){
        
    $task ->update(['is_done' => true]);
    return redirect()->route('tasks.index')->with('success', 'Task is Done');
    }
}   