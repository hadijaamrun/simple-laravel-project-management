@extends('layouts.app')

@section('content')
    <h1>Edit Project</h1>
    <form method="POST" action="{{ route('projects.update', $project) }}">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $project->name }}">
        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ $project->description }}</textarea>
        <label for="deadline">Deadline:</label>
        <input type="date" name="deadline" id="deadline" value="{{ $project->deadline }}">
        <button type="submit">Update</button>
    </form>
@endsection
