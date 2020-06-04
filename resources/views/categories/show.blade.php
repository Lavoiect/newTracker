@extends('layouts.app')

@section('content')



    Tabs


        <h2>{{ $category->name }}</h2>



<a class="btn btn-primary" href="{{ route('categories.edit', $category->slug) }}">Edit</a>
<form method="post" action="{{  route('categories.delete', $category->id) }}">
    {{ method_field('delete') }}
    <button class="btn btn-danger" type="submit">Delete</button>
    {{ csrf_field() }}
</form>

@foreach ($category->project as $project)
            <a href="{{ route('projects.show', $project->id) }}"><h3>{{ $project->title }}</h3></a>
        @endforeach

@endsection
