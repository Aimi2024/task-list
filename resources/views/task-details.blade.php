@extends('layouts.app')

@section('title',$tasks -> title)


@section('content')

<div class="mb-4">
    <a href="{{ route('tasks.index') }}" class="link"> ← Go back to the task list! </a>
</div>

<p class="mb-1 text-slate-700 " >{{ $tasks->description }}</p>
<br>

  @if ( $tasks->long_description )
  <p class="mb-4 text-slate-700 " >{{ $tasks->long_description }}</p>
  @endif

  <p class="mb-4 text-gray-400 ">Created {{ $tasks->created_at->diffForHumans() }} • Updated {{ $tasks->updated_at->diffForHumans() }} </p>


  <p class="mb-4">
    @if ($tasks->completed)
    <span class="font-medium text-green-500"> Completed</span>


    @else
    <span class="font-medium text-red-500">  Not Completed</span>

    @endif
  </p>

  <div class="flex gap-2 " >
    <a href="{{ route('tasks.edit', ["task"=>$tasks] ) }} " class="btn">Edit</a>

    <form method="POST" action="{{ route('tasks.toggle-complete',['task'=>$tasks]) }}">
        @csrf
        @method('PUT')
        <button class="btn" type="submit">Mark As {{ $tasks->completed ?'not Completed' :'Completed' }}</button>
    </form>

    <form method="POST"  action="{{ route('tasks.destroy',['task'=> $tasks]) }}">
@csrf
@method('DELETE')
    <button class="btn" type="submit">Delete</button>

</form>
  </div>
@endsection
