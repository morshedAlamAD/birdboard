@extends('layouts.app')
@section('header')
<div class="flex justify-between items-end">
    <h3 class="text-lg font-bold text-blue-400">{{auth()->user()->name}}'s projects.</h3>
    <a class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded" href="/project/create">Add New</a>
</div>
@endsection
@section('content')
<div class="container m-auto">
    <div class="grid grid-cols-3 m-3">
        @foreach ( $hello as $data )
            <div class=" rounded-xl shadow-lg w-96 mb-4 bg-white p-4 mx-3 h-52">
                <a href="project/{{$data->id}}">
                    <h1 class=" font-bold mb-6 text-xl text-gray-700 pl-4 border-l-4 -ml-4 py-2 border-blue-300">{{$data->title}}</h1>
                    <p class=" text-gray-500">{{Str::limit($data->description,100, '...')}}</p>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
