@extends('layouts.app')

@section('title')
<div class="border border-slate-400 font-bold mb-5 px-4 py-3 text-center">The List Of Tasks</div>
@endsection

@section ('content')
<div>
    <div>
        <a href="{{ route('tasks.index') }}" class=""> </a>
    </div>
        <nav class="mb-4 " >
            <a href="{{route('tasks.create')}}" class="relative btn bg-blue-500" style="margin-left: 1195px">
                Add Task
            </a>
        </nav>
    <table class="w-full border-collapse border border-slate-500 text-sm text-left text-black dark:text-black border: border-spa">
            <tr class="text-left text-orange-500 text-lg text-center">
                <td>Title</td>
                <td>Date</td>
                <td>Action</td>
                <td>Status</td>
            </tr>
            @forelse ($tasks as $task)
                <tr class="border-collapse border border-slate-500">
                    <td class="px-4">
                        <a href="{{ route('tasks.show', ['task' => $task -> id]) }}" @class(['line-through' => $task->completed])>{{ $task->title }}</a>
                    </td>
                    <td class="text-center">
                        <p> {{ $task->created_at->diffForHumans() }}</p>
                    </td>
                    <td class="flex gap-2 content-center">
                        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn bg-red-500">
                                Delete
                            </button>
                        </form>
                        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn bg-green-500">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn">
                                {{ $task->completed ? 'not completed' : 'completed' }}
                            </button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td>
                        There is no task
                    </td>
                </tr>
            @endforelse

    </table>
    @if ($tasks -> count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>

    @endif
</div>
@endsection
