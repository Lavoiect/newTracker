@extends('layouts.app')

@section('content')

  @include('layouts.sideNav')

    <div class="navContent">
         <div class="subBar">
            <i class="zmdi zmdi-account"></i> <i class="zmdi zmdi-chevron-right"></i> {{ $user->name }}'s Profile


        </div>

<div class="card profileCard">
    <h3>Assigned Projects</h3>
<ul>
    @foreach ($user->projects as $project)
    <li>
       <a href="{{ route('projects.show', [$project->slug]) }}">{{ $project->title }}</a>
    </li>
    @endforeach
</ul>
</div>

@endsection
