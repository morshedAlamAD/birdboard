
@extends('layouts.app')
@section('header')
<div class=" flex justify-between ">
    <h3>Create New Project.</h3>
    <a href="/project" class=" text-gray-500">cancel</a></div>

@endsection
@section('content')
<div class="container mx-auto mt-3">
<div class="flex h-full items-center justify-start bg-gray-50 rounded-md">
  <div class="mx-auto w-full max-w-lg my-8" >
    <form action="/project" method="POST" class="mx-auto w-full max-w-[550px]">
    @csrf
    @method('post')
    @include('projects.form',['project' => new App\Models\Project])
    </form>
  </div>
</div>
</div>
@endsection
