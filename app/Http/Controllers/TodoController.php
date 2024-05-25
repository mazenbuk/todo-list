<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo; // Import the Todo model
use Illuminate\Validation\ValidationException; // Import the ValidationException class

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('index')->with('todos', $todos);
    }

    public function create(){
        return view('todos.create');
    }

    public function details(Todo $todo){
        return view('todos.details')->with('todo', $todo);
    }

    public function edit(Todo $todo){
        return view('todos.edit')->with('todo', $todo);
    }    

    public function update(Todo $todo){
        try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required'],
            ]);
        } catch (ValidationException $e) {
            // Handle the validation exception if necessary
        }

        $data = request()->all();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo updated successfully');

        return redirect('/');
    }

    public function delete(Todo $todo){
        $todo->delete();
        session()->flash('success', 'Todo deleted successfully');
        return redirect('/');
    }    

    public function store(){
        try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required']
            ]);
        } catch (ValidationException $e) {
            // Handle the validation exception if necessary
        }

        $data = request()->all();

        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo created successfully');

        return redirect('/');
    }
}
