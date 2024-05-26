<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo; // Import the Todo model
use Illuminate\Validation\ValidationException; // Import the ValidationException class

class TodoController extends Controller
{
    public function index(Request $request) {
        $category = $request->input('category', 'Work');
        $todos = Todo::where('category', $category)->get();
        $completedCount = $todos->where('status', 'done')->count();
    
        return view('index', compact('todos', 'completedCount', 'category'));
    }
    
    public function work() {
        return redirect()->route('todos.index', ['category' => 'Work']);
    }
    
    public function home() {
        return redirect()->route('todos.index', ['category' => 'Home']);
    }
    
    public function other() {
        return redirect()->route('todos.index', ['category' => 'Other']);
    }    

    public function create(Request $request) {
        $category = $request->input('category', 'Work');
        return view('todos.create', compact('category'));
    }    

    public function details(Todo $todo){
        return view('todos.details')->with('todo', $todo);
    }

    public function edit(Todo $todo){
        return view('todos.edit')->with('todo', $todo);
    }    

    public function update(Request $request, Todo $todo){
        try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required'],
                'status' => ['required']
            ]);
        } catch (ValidationException $e) {
            // Handle the validation exception if necessary
        }
    
        $data = request()->all();
    
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->status = $data['status'];
        $todo->save();
    
        session()->flash('success', 'Todo updated successfully');
    
        return redirect('/');
    }    

    public function delete(Todo $todo){
        $todo->delete();
        session()->flash('success', 'Todo deleted successfully');
        return redirect('/');
    }    

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'category' => 'required|string'
        ]);
    
        Todo::create($data);
    
        session()->flash('success', 'Todo created successfully');
        return redirect()->route('todos.index', ['category' => $data['category']]);
    }
    

    public function clearCompleted() {
        Todo::where('status', 'done')->delete();
        return response()->json(['status' => 'success']);
    }    
    
}
