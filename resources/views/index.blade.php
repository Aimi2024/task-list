@extends('layouts.app')

@section('title','List Of Task')



@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link"> Create Task</a>
    </nav>

    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                @class(['font-bold','line-through text-gray-200'=> $task->completed])
                >{{ $task->title }}
            </a>
        </div>
    @empty
        <p> Empty list</p>
    @endforelse

    @if ($tasks->count())
<div>
    <nav class="mt-4">{{ $tasks->links() }}</nav>

</div>
    @endif

@endsection
