@extends('layouts.app')

@section('title')
The List Of Tasks
@endsection

@section ('content')
<div>
        <nav class="mb-4">
            <a href="{{route('tasks.create')}}">Add Task</a>
        </nav>
        @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task -> id]) }}">{{ $task->title }}</a>
        </div>
        @empty
            <div>There is no task</div>
        @endforelse

        @if ($tasks -> count())
            <nav>
                {{ $tasks->links() }}
            </nav>

        @endif
</div>
@endsection
