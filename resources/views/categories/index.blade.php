@extends('layouts.app')

@section('content')

    Categories

    @foreach ($categories as $cat)

<p><a href="{{ route('categories.show', $cat->slug) }}">{{ $cat->name }}</a></p>
    @endforeach

<a href="{{ route('categories.create') }}">Add Tab</a>

@endsection
