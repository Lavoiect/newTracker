@extends('layouts.app')

@section('content')
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



@endsection
