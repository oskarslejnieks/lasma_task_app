@extends('template')

@section('content')
    <div class="container">
        <h1>Create task</h1>
        <a class="back" href={{ route('tasks.index') }}>To all tasks</a>
        @if ($errors->any())
            {!! implode('', $errors->all('<div class="alert-error">:message</div>')) !!}
        @endif
        <form class="form-edit-create" action="{{ route('tasks.store') }}" method="POST">

            {{ csrf_field() }}
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4"></textarea>
            <label for="due_datetime">Due</label>
            <input type="datetime-local" name="due_datetime" placeholder="Due Datetime" min="{{ now()->format('Y-m-d\TH:i') }}">
            <input type="submit" class="btn btn-primary" value="Submit Task">
        </form>
    </div>
@endsection
