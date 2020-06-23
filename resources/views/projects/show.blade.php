@extends('layouts.app')
@include('partials.meta_dynamic')

@section('content')
    @include('layouts.sideNav')

<div class="navContent">
         <div class="subBar">
             <a href="{{ route('projects') }}"><i class="zmdi zmdi-assignment"></i></a>
             <i class="zmdi zmdi-chevron-right"></i>{{ $project->title }}
    </div>
    <div class="card adminContent" style="border-top: 5px solid #FAA41A">

<div class="container">
  <div class="row">
    <div class="col-9"><h2 class="projectTitle float-left mb-4">{{ $project->title }}</h2>
                            @if(Auth::user()->role_id === 1 || Auth::user()->role_id === 2 && Auth::user()->id === $project->user_id)
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-link" href="{{ route('projects.edit', [$project->slug]) }}"><i class="zmdi zmdi-edit"></i></a>
                                 @if(Auth::user() && Auth::user()->role_id === 1)
                                <form method="post" action="{{  route('projects.delete', $project->id) }}">
                                    {{ method_field('delete') }}
                                    <button class="btn btn-link" type="submit" style="color: red"><i class="zmdi zmdi-delete"></i></button>
                                    {{ csrf_field() }}
                                </form>
                                @endif
                            </div>
                            @endif</div>
    <div class="col-6">
        <h5 class="lineTitle">Project Scope:</h5>
        {{$project->scope}}
    </div>
    <div class="col-">
        <div class="row">
            <div class="col-12">
                <h5 class="lineTitle">Due Date:</h5>
                {{$project->dueDate}}
            </div>
            <div class="col-12">
                <h5 class="lineTitle mt-3">Lead Developer</h5>
                @if ($project->user_id)
                     {{ $project->user->name }}
                @else
                    N/A
                @endif
            </div>
        </div>
    </div>
  </div>

<div class="row">
    <div class="col-3">
        <h5 class="lineTitle mt-3">Stakeholder:</h5>
        {{ $project->stakeholder }}
    </div>
    <div class="col-3">
        <h5 class="lineTitle mt-3">Submitted By:</h5>
       {{$project->submittedBy}}
    </div>
     <div class="col-3">
        <h5 class="lineTitle mt-3">Subject Matter Expert:</h5>
       {{$project->sme}}
    </div>
</div>





@if ($project->requestType === 'New')
<div class="row">
    <div class="col-6">
        <h5 class="lineTitle mt-3">Type of training request:</h5>
        {{$project->requestType}}
    </div>
    <div class="col-6">
         <h5 class="lineTitle mt-3">Does this training align with any performance metric?</h5>
            {{$project->performMetric}}
    </div>
</div>


             @else
             <div class="row">
                 <div class="col-6">
                     <h5 class="lineTitle mt-3">What needs updating</h5>
                     {{$project->whatUpdate}}
                </div>
                 <div class="col-6">
                     <h5 class="lineTitle mt-3">Details</h5>
                    {{$project->describe}}
                 </div>
                 <div class="col-6">
                     <h5 class="lineTitle mt-3">FCID</h5>
                {{$project->fcid}}
                 </div>
             </div>
            @endif

<div class="row">
<div class="col-12">
    <h5 class="lineTitle mt-3">Project Notes:</h5>
    @if($project->body)
        {!! $project->body !!}

    @else
        No project notes.
    @endif
</div>
<div class="col-5">
    <h5 class="lineTitle mt-3">Project Tab(s):</h5>
@foreach ($project->category as $cat)
<span>{{ $cat->name }}</span>
@endforeach

</div>

</div>



  @if ($project->attachment)
                            <a href="/images/attachments/{{ $project->attachment ? $project->attachment : '' }}">attachment</a>
                        @endif

</div>

</div>






<!--
{{ $project->created_at->diffForHumans() }}

</div> -->


@endsection

