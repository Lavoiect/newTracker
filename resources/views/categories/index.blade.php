@extends('layouts.app')

@section('content')
@include('layouts.sideNav')

<div class="navContent">
         <div class="subBar">
             <a href="{{route('admin.index')}}"><i class="zmdi zmdi-settings"></i></a>  <i class="zmdi zmdi-chevron-right"></i>
            <i class="zmdi zmdi-tab"></i> <i class="zmdi zmdi-chevron-right"></i>Manage Tabs
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
