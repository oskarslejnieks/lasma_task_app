@extends('template')

@section('content')

<div class="container">
    <div class="welcome-buttons">
        <button class="btn-new-task"> <a href="{{ route('tasks.create') }}" class="" role="button">Add new task</a></button>
        <button class="btn-all-tasks"> <a href="{{ route('tasks.index') }}" class="" role="button">See all tasks</a></button>
    </div>
</div>

@endsection