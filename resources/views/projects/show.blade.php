@extends('layouts.app')
@include('partials.meta_dynamic')

@section('content')

    project


        <h2>{{ $project->title }}</h2>
        <p>{!! $project->body !!}</p>
       @if ($project->attachment)
<a href="/images/attachments/{{ $project->attachment ? $project->attachment : '' }}">attachment</a>
    @endif
@foreach ($project->category as $cat)
<span>{{ $cat->name }}</span>


@endforeach


 @if (Auth::user() && Auth::user()->role_id === 1)
        <a class="btn btn-primary" href="{{ route('projects.edit', [$project->slug]) }}">Edit</a>
<form method="post" action="{{  route('projects.delete', $project->id) }}">
    {{ method_field('delete') }}
    <button class="btn btn-danger" type="submit">Delete</button>
    {{ csrf_field() }}
</form>
    @endif

@endsection
