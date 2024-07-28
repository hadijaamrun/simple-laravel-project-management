@extends('layouts.app')

@section('content')
    <h1>{{ $project->name }}</h1>
    <p>{{ $project->description }}</p>
    <p>Deadline: {{ $project->deadline }}</p>
    <a class="edit" href="{{ route('projects.edit', $project) }}">Edit Project</a>
    <form method="POST" action="{{ route('projects.destroy', $project) }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Project</button>
    </form>

    <h2>Tasks</h2>
    <a class="edit" href="{{ route('tasks.create', $project) }}">Create New Task</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Deadline</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($project->tasks as $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->deadline }}</td>
                    <td>
                        <a class="edit" href="{{ route('tasks.edit', [$project, $task]) }}">Edit</a>
                        <form method="POST" action="{{ route('tasks.destroy', [$project, $task]) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="chart-container">
        <canvas id="progressChart"></canvas>
    </div>
@endsection

@section('scripts')
    <script>
        const ctx = document.getElementById('progressChart').getContext('2d');
        const progressChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Pending', 'In Progress', 'Completed'],
                datasets: [{
                    data: [
                        {{ $project->tasks->where('status', 'pending')->count() }},
                        {{ $project->tasks->where('status', 'in_progress')->count() }},
                        {{ $project->tasks->where('status', 'completed')->count() }}
                    ],
                    backgroundColor: ['#ff6384', '#36a2eb', '#4bc0c0'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Project Progress'
                    }
                }
            },
        });
    </script>
@endsection
