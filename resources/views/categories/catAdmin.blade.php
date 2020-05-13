@extends('layouts.app')

@section('content')
    Tab:


        <h2>{{ $category->name }}</h2>

@foreach ($category->project as $project)
            <a href="{{ route('projects.show', $project->id) }}"><h3>{{ $project->title }}</h3></a>
        @endforeach

@endsection
