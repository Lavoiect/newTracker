@extends('layouts.app')

@section('content')
@include('layouts.sideNav')

<div class="navContent">
         <div class="subBar">
            <i class="zmdi zmdi-view-dashboard"></i> <i class="zmdi zmdi-chevron-right"></i>Projects
    </div>
    <div class="card adminContent">
        <div class="container">

    @foreach ($categories as $cat)

<p><a href="{{ route('categories.show', $cat->slug) }}">{{ $cat->name }}</a></p>
    @endforeach

<a href="{{ route('categories.create') }}">Add Tab</a>
        </div>
    </div>
@endsection
