@extends('layouts.app')

@section('content')
    <h1>Create Task for Project: {{ $project->name }}</h1>
    <form method="POST" action="{{ route('tasks.store', $project) }}">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="pending">Pending</option>
            <option value="in_progress">In Progress</option>
            <option value="completed">Completed</option>
        </select>
        <label for="deadline">Deadline:</label>
        <input type="date" name="deadline" id="deadline">
        <button type="submit">Create Task</button>
    </form>
@endsection
