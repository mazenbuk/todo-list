@extends('layouts.app')

@section('title')
    My Todo App
@endsection

@section('content')

<div class="row mt-3">
    <div class="col-4">
        <h5>Todo</h5>
        <div class="card">
            <div class="card-body">
                @foreach ($todos as $todo)
                    @if($todo->status == 'todo')
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="card-title">{{ $todo->name }}</h6>
                                <p class="card-text">{{ $todo->description }}</p>
                                <a href="{{ route('todos.details', $todo->id) }}" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-4">
        <h5>In Progress</h5>
        <div class="card">
            <div class="card-body">
                @foreach ($todos as $todo)
                    @if($todo->status == 'in-progress')
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="card-title">{{ $todo->name }}</h6>
                                <p class="card-text">{{ $todo->description }}</p>
                                <a href="{{ route('todos.details', $todo->id) }}" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-4">
        <h5>Done</h5>
        <div class="card">
            <div class="card-body">
                @foreach ($todos as $todo)
                    @if($todo->status == 'done')
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="card-title">{{ $todo->name }}</h6>
                                <p class="card-text">{{ $todo->description }}</p>
                                <a href="{{ route('todos.details', $todo->id) }}" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
