@extends('layouts.app')

@section('content')

@include('layouts.sideNav')

<div class="navContent">
         <div class="subBar">
            <i class="zmdi zmdi-view-dashboard"></i> <i class="zmdi zmdi-chevron-right"></i>Projects
    </div>
    <div class="card adminContent">
        <div class="container">
    Trash projects

    @foreach ($trashedProjects as $project)
        <h2>{{ $project->title }}</h2>
        <p>{{ $project->body }}</p>
        {{ $project->id }}
        <form method="get" action="{{ route('projects.restore', $project->id) }}">
            <button type="submit" class="btn btn-success">Restore Project</button>
            {{csrf_field()}}
        </form>

        <form method="post" action="{{ route('projects.permDelete', $project->id) }}">
            {{ method_field('delete') }}
            <button type="submit" class="btn btn-danger">Delete</button>
            {{csrf_field()}}
        </form>
    @endforeach
        </div>
    </div>


@endsection
