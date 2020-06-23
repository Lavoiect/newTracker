@extends('layouts.app')

@section('content')
@include('partials.meta_static')
@include('layouts.sideNav')

@include('layouts.sideNav')

<div class="navContent">
         <div class="subBar">
            <i class="zmdi zmdi-delete"></i> <i class="zmdi zmdi-chevron-right"></i>Manage Projects
    </div>
    <div class="card adminContent">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1>Published Projects</h1>
                     @foreach ($publishedProjects as $project)
                     <a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a>
                     <form action="{{ route('projects.update', $project->id) }}" method="post">
                    {{ method_field('patch') }}
                        <input name="status" type="checkbox" value="0" checked style="display: none">
                        <button class="btn btn-success" type="submit">Move to drafts</button>
                    {{ csrf_field()}}
                </form>
                     @endforeach
                </div>
                <div class="col-6">
                    <h1>Draft Projects</h1>
                    @foreach ($draftProjects as $project)
                    <a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a>
                    <form action="{{ route('projects.update', $project->id) }}" method="post">
                    {{ method_field('patch') }}
                        <input name="status" type="checkbox" value="1" checked style="display: none">
                        <button class="btn btn-success" type="submit">Publish</button>
                    {{ csrf_field()}}
                </form>
                    @endforeach
                </div>
            </div>




            </div>


            </div>
        </div>

@endsection
