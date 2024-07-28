@extends('layouts.app')

@section('content')
    <h1>Edit Task: {{ $task->name }}</h1>
    <form method="POST" action="{{ route('tasks.update', [$project, $task]) }}">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $task->name }}" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ $task->description }}</textarea>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="pending" @if ($task->status == 'pending') selected @endif>Pending</option>
            <option value="in_progress" @if ($task->status == 'in_progress') selected @endif>In Progress</option>
            <option value="completed" @if ($task->status == 'completed') selected @endif>Completed</option>
        </select>
        <label for="deadline">Deadline:</label>
        <input type="date" name="deadline" id="deadline" value="{{ $task->deadline }}">
        <button type="submit">Update Task</button>
    </form>
@endsection
