@extends('layouts.app')
@section('header')
<div class="flex justify-between">
<div class="items-center flex">
    <p class=" text-gray-500 pr-2 "> <a href="/project">My Projects</a> / {{Str::limit($project->title, 20, '...') }}</p>
    <a href="#" class="button-blue ml-3"> add tasks</a>
</div>
<div class="flex">
    <div class="flex">
        <img class="small-img" src="https://i.pravatar.cc/150?img=2" alt="avater">
        <img class="small-img" src="https://i.pravatar.cc/150?img=3" alt="avater">
        <img class="small-img" src="https://i.pravatar.cc/150?img=5" alt="avater">
    </div>
    <a href="{{$project->path().'/edit'}}" class="button-blue ml-3">Edit Project</a>
</div>
</div>


@endsection
@section('content')
<div class="container mx-auto">
   <div class="flex">
        <div class=" w-3/4 px-4 -mt-1">
            <div  class="mb-8">
                <h2 class="text-gray-500 text-lg py-4">Tasks</h2>
                @foreach ($project->tasks as $data )
                    <form action="{{$data->path()}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="flex card-sm w-full mb-2 border-none items-center">
                            <input class="w-full border-none @if($data->completed) text-gray-300 @endif" type="text" name="body" value="{{$data->body}}">
                            <input type="checkbox" name="completed"  onchange="this.form.submit()" @checked($data->completed)>
                        </div>
                    </form>
                @endforeach
            <form action="/project/{{$project->id}}/tasks" method="POST">
                @csrf
                @method('post')
                <input class="card-sm w-full mb-2 border-none" name="body" placeholder="Add New Task">
            </form>
            </div>
            <div class=" mb-5">
                <h2 class="text-gray-500 text-lg py-4">General Notes</h2>
                <form action="{{$project->path()}}" method="POST">
                    @csrf
                    @method('patch')
                    <textarea class="card-sm w-full h-52 border-none" name="note"> {{$project->note}}</textarea>
                            @error('note')
                                <p class=" text-xs text-red-600 font-bold">{{$message}}</p>
                            @enderror
                    <input type="submit" class="button-blue -mt-3" placeholder="update">
                </form>
            </div>
        </div>
        <div class="flex flex-col w-1/4">
        <div class="card w-full h-52 mt-14 ">
                <a href="/project/{{$project->id}}">
                    <h1 class=" font-bold mb-6 text-xl text-gray-700 pl-4 border-l-4 -ml-4 py-2 border-blue-300">{{$project->title}}</h1>
                    <p class=" text-gray-500">{{Str::limit($project->description,100, '...')}}</p>
                </a>

        </div>
        <div class="card w-full h-52 mt-5 ">
            <ul>
                @foreach ($project->activities as $items )
                    <li>{{$items->description}}</li>
                @endforeach
            </ul>
        </div>
        </div>
</div>
</div>
@endsection

