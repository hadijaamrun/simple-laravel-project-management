@extends('layouts.app')

@section('content')
    <h1>Projects</h1>
    <form method="GET" action="{{ route('projects.index') }}">
        <input type="text" name="search" placeholder="Search projects">
        <button id="search" type="submit">Search</button>
    </form><br>
    <a class="edit" href="{{ route('projects.create') }}">Create New Project</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Deadline</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td><a id="kelas" href="{{ route('projects.show', $project) }}">{{ $project->name }}</a></td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->deadline }}</td>
                    <td>
                        <a class="edit" href="{{ route('projects.edit', $project) }}">Edit</a>
                        <form method="POST" action="{{ route('projects.destroy', $project) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
