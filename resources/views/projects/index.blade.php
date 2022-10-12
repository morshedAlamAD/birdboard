@extends('layouts.app')
@section('header')
<div class="flex justify-between items-end">
    <h3 class="text-lg font-bold text-gray-700">{{auth()->user()->name}}'s projects.</h3>
    <a class="button-blue" href="/project/create">Add New</a>
</div>
@endsection
@section('content')
<div class="container m-auto">
    <div class="grid grid-cols-3 m-3">
        @foreach ( $hello as $data )
            <div class=" card mx-3 w-96 h-52">
                <a href="/project/{{$data->id}}">
                    <h1 class=" font-bold mb-6 text-xl text-gray-700 pl-4 border-l-4 -ml-4 py-2 border-blue-300">{{$data->title}}</h1>
                    <p class=" text-gray-500">{{Str::limit($data->description,100, '...')}}</p>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
