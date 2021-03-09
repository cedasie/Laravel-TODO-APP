@extends('layouts.app')
@section('content')

<h1>Task List</h1>
@foreach ($tasks as $task)
<div class="card @if($task->isCompleted()) border-success @endif" style="margin-bottom: 20px;">
    <div class="card-body">
        <p>

            {{$task->description}}</p>
        @if (!$task->isCompleted())
        <form action="/tasks/{{$task->id}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="d-grid gap-2">
                <button class="btn btn-light" input="submit">Complete</button>
            </div>
        </form>
        @else
        <form action="/tasks/{{$task->id}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="d-grid gap-2">
                <button class="btn btn-outline-danger" input="submit">Delete</button>
            </div>
        </form>
        @endif

    </div>
</div>
@endforeach
<div class="d-grid gap-2">
    <a href="/tasks/create" class="btn btn-primary btn-lg">New Task</a>
</div>
@endsection