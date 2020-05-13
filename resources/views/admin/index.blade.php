@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-3">@include('layouts.sideNav')</div>
    <div class="col-3"></div>
</div>
<h1>Admin Page:</h1>
<a href="{{ route('projects.create') }}">Create Project</a>
<a href="{{ route('projects.trash') }}">Trashed Projects</a>
<a href="{{ route('categories.index') }}">Add Project Tab</a>
<a href="{{ route('admin.projects') }}">Manage Projects</a>


@endsection
