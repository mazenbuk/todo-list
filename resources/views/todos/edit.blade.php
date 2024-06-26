@extends('layouts.app')
@section('title')
    Edit Todo
@endsection
@section('content')

<form action="{{ route('todos.update', $todo->id) }}" method="post" class="mt-4 p-4">
    @csrf
    @method('PATCH')
    <div class="form-group m-3">
        <label for="name">Todo Name</label>
        <input type="text" class="form-control" value="{{ $todo->name }}" name="name">
    </div>
    <div class="form-group m-3">
        <label for="description">Todo Description</label>
        <textarea class="form-control" name="description" rows="3">{{ $todo->description }}</textarea>
    </div>
    <div class="form-group m-3">
        <label for="status">Status</label>
        <select class="form-control" name="status">
            <option value="todo" {{ $todo->status == 'todo' ? 'selected' : '' }}>Todo</option>
            <option value="in-progress" {{ $todo->status == 'in-progress' ? 'selected' : '' }}>In Progress</option>
            <option value="done" {{ $todo->status == 'done' ? 'selected' : '' }}>Done</option>
        </select>
    </div>
    <div class="form-group m-3">
        <input type="submit" class="btn btn-primary float-end" value="Submit">
    </div>
</form>

@endsection
