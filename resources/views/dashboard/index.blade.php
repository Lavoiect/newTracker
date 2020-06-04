@extends('layouts.app')

@section('content')

   @include('layouts.sideNav')

    <div class="navContent">
         <div class="subBar">
            Dashboard
        </div>
        <div class="row">
            <div class="col-6 no-padding">
                <div class="card">
             <div class="card-body">
                    <h5 class="card-title">Current Projects</h5>
                    <ul>
                        @foreach ($category->project as $project)
                            @if ($project->user_id === Auth::user()->id)
                                <li><a href="{{ route('projects.show', [$project->slug]) }}">{{ $project->title }}</a></li>
                            @endif
                        @endforeach
                    </ul>

            </div>
        </div>
            </div>
            <div class="col-6">
                <div class="card">
             <div class="card-body">
                    <h5 class="card-title">Upcoming Projects</h5>
                    <ul>
                        @foreach ($upcoming->project as $project)
                        @if ($project->user_id === Auth::user()->id)
                               <li><a href="{{ route('projects.show', [$project->slug]) }}">{{ $project->title }}</a></li>
                        @endif
                        @endforeach
                    </ul>
            </div>
        </div>
            </div>
        </div>

    </div>



@endsection
