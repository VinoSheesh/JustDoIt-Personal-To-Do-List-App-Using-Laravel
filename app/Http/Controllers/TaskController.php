<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        // Logic to retrieve and display tasks
        return view('tasks.index');
    }

    public function create(){
        // Logic to show the form for creating a new task
        return view('tasks.create');
    }

    public function store(Request $request){

    }

    public function show($id){
        // Logic to display a specific task
        return view('tasks.show', ['id' => $id]);
    }

    public function edit($id){
        // Logic to show the form for editing a specific task
        return view('tasks.edit', ['id' => $id]);
    }
    
    public function update(Request $request, $id){
        // Logic to update a specific task
    }

    public function destroy($id){
        // Logic to delete a specific task
            return redirect()->route('tasks.index');
        }

    public function done($id){
   ;
    }
