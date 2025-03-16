@extends('layouts.app')


@section('styles')



@section('content')
@include('form',['task'=> $tasks->id])
@endsection
