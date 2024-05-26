@extends('layouts.app')

@section('title')
    Create Todo
@endsection

@section('content')

<form action="{{ route('todos.store') }}" method="post" class="mt-4 p-4">
    @csrf
    <div class="form-group m-3">
        <label for="name">Todo Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group m-3">
        <label for="description">Todo Description</label>
        <textarea class="form-control" name="description" rows="3" required></textarea>
    </div>
    <div class="form-group m-3">
        <label for="status">Status</label>
        <select class="form-control" name="status">
            <option value="todo">ToDo</option>
            <option value="in-progress">In Progress</option>
            <option value="done">Done</option>
        </select>
    </div>
    <input type="hidden" name="category" value="{{ request()->get('category', 'Work') }}">
    <div class="form-group m-3">
        <input type="submit" class="btn btn-primary float-end" value="Submit">
    </div>
</form>

@endsection
