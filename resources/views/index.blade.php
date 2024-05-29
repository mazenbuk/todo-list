@extends('layouts.app')

@section('title')
    Sumbersari ToDo
@endsection

@section('content')

<div class="row mt-3">
    <div class="col-12 col-md-4 mb-3">
        <h5>Todo</h5>
        <div class="card">
            <div class="card-body">
                @foreach ($todos as $todo)
                    @if($todo->status == 'todo')
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title" style="font-weight: bold;">{{ $todo->name }}</h5>
                                <p class="card-text">{{ $todo->description }}</p>
                                <a href="{{ route('todos.details', $todo->id) }}" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 mb-3">
        <h5>In Progress</h5>
        <div class="card">
            <div class="card-body">
                @foreach ($todos as $todo)
                    @if($todo->status == 'in-progress')
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title" style="font-weight: bold;">{{ $todo->name }}</h5>
                                <p class="card-text">{{ $todo->description }}</p>
                                <a href="{{ route('todos.details', $todo->id) }}" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 mb-3">
        <h5>Done</h5>
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                @if ($completedCount > 0)
                    <p class="mb-0" id="completedCount">{{ $completedCount }} Completed</p>
                    <div>
                        <a href="#" id="showCompleted" class="btn btn-link">Show</a>
                        <form method="GET" action="{{ url('/') }}" style="display: inline;">
                            <input type="hidden" name="clear_completed" value="1">
                            <button type="submit" class="btn btn-danger btn-sm">Clear All</button>
                        </form>
                    </div>
                @else
                    <p id="completedCount">No tasks completed yet.</p>
                @endif
            </div>
            <div id="completedTodos" style="display: none;">
                @foreach ($todos as $todo)
                    @if($todo->status == 'done')
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title" style="font-weight: bold;">{{ $todo->name }}</h5>
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

<script>
document.getElementById('showCompleted').addEventListener('click', function() {
    var completedTodos = document.getElementById('completedTodos');
    if (completedTodos.style.display === 'none') {
        completedTodos.style.display = 'block';
    } else {
        completedTodos.style.display = 'none';
    }
});
</script>

@endsection
