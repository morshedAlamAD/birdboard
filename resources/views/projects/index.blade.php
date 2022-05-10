{{-- @extends('layouts.app')
@section('content') --}}
@foreach ( $hello as $data )
    <li style="list-style: none"><h1><a href=" {{$data->path()}} "> {{$data->title}} </a></h1>
@endforeach
{{-- @endsection --}}
