@extends('template')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <p>
                <a href="{{ route('tasks.create') }}" class="btn-btn-primary btn-lg" role="button">
                    <button>
                        Add Task
                    </button>
                </a>
            </p>
        </div>

        <h2>List of Tasks</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @foreach ($tasks as $task)
            @unless ($task->completed)
                <div class="card">
                    <div class="card-body">
                        <div class="card-info">
                            <h5>{{ $task->title }}</h5>
                            <p>Description: {{ $task->description }}</p>
                            <p>Due: <strong>{{ \Carbon\Carbon::parse($task->due_datetime)->format('Y-m-d H:i:s') }}</strong></p>
                            <p>Created: <strong>{{ $task->created_at->diffForHumans() }}</strong></p>
                        </div>
                        <div class="card-buttons">
                            <button style="background-color: orange"><a
                                    href={{ route('tasks.edit', $task->id) }}>Edit</a></button>
                            <form style="none" method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: red"><a>Delete</a></button>
                            </form>
                            <form action="{{ route('tasks.markAsCompleted', $task->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <span><strong>Check if task has been completed</strong></span>
                                <input type="checkbox" name="completed" onchange="this.form.submit()" />
                            </form>
                        </div>
                    </div>

                </div>
            @endunless
        @endforeach
    </div>
@endsection
