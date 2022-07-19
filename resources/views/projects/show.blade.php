@extends('layouts.app')
@section('header')
@endsection
@section('content')
<div class="container mx-auto">
<h3>{{$project->title}}</h3>
<p> {{$project->description}} </p>
</div>
@endsection

