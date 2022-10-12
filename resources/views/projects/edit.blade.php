@extends('layouts.app')
@section('header')
<div class=" flex justify-between ">
    <h3>Edit Project.</h3>
    <a href="/project" class=" text-gray-500">cancel</a></div>

@endsection
@section('content')
<div class="container mx-auto mt-3">
<div class="flex h-full items-center justify-start bg-gray-50 rounded-md">
  <div class="mx-auto w-full max-w-lg my-8" >
    <form action="{{$project->path()}}" method="POST" class="mx-auto w-full max-w-[550px]">
    @csrf
    @method('patch')
    @include('projects.form')
    </form>
  </div>
</div>
</div>
@endsection
