@extends('layouts.app')
@include('partials.meta_dynamic')

@section('content')

<div class="card projectCard navContent">
    <h6>Project Name(show):</h6>

        <h2 class="title">{{ $project->title }} @if(Auth::user())
 @if (Auth::user()->role_id === 1 || Auth::user()->role_id === 2 && Auth::user()->id === $project->user_id)
        <a href="{{ route('projects.edit', [$project->slug]) }}"><i class="zmdi zmdi-edit"></i></a>

@if(Auth::user() && Auth::user()->role_id === 1)
        <form method="post" action="{{  route('projects.delete', $project->id) }}">
            {{ method_field('delete') }}
            <button class="btn btn-danger" type="submit">Delete</button>
            {{ csrf_field() }}
        </form>
@endif
@endif
@endif</h2>
        <div class="row">
            <div class="col-6">
                @if($project->user)
                    <h6>Project Lead:</h6> <p><a href="{{ route('projects', $project->user->name) }}"> {{ $project->user->name }}</a></p>
                @endif

            </div>
            <div class="col-6">
               <h6>Stakeholder:</h6><p>{{ $project->stakeholder }}</p>
            </div>
        </div>
<div class="row">
<div class="col-6"><h6>Due Date:</h6>{{$project->dueDate}}</div>
    <div class="col-6">
        <h6>Submitted By:</h6>
       <p>{{$project->submittedBy}}</p>
    </div>
</div>

<div class="row">
<div class="col-12"><h6>Project Scope:</h6>{!! $project->body !!}</div>
</div>
<h6>Tabs:</h6>
@foreach ($project->category as $cat)
<span>{{ $cat->name }}</span>
@endforeach

                        @if ($project->attachment)
                            <a href="/images/attachments/{{ $project->attachment ? $project->attachment : '' }}">attachment</a>
                        @endif
<!--
{{ $project->created_at->diffForHumans() }}

</div> -->

@endsection

