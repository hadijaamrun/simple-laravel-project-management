@extends('layouts.app')

@section('content')
    <h1>Notifications</h1>
    <ul>
        @foreach ($notifications as $notification)
            <li class="{{ $notification->read_at ? 'read' : 'unread' }}">
                <a href="{{ url('/projects/' . $notification->data['project_id']) }}">
                    {{ $notification->data['message'] }}: {{ $notification->data['task_name'] }}
                </a>
                @if (!$notification->read_at)
                    <a href="{{ route('notifications.markAsRead', $notification->id) }}">Mark as read</a>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
