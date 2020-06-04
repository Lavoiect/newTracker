@extends('layouts.app')

@section('content')
<h3>{{ $user->name }}</h3>
    @foreach ($user->projects as $project)
        {{ $project->title }}
    @endforeach
@endsection
