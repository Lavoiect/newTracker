@extends('layouts.app')

@section('content')

   @include('layouts.sideNav')

    <div class="navContent">
         <div class="subBar">
            <i class="zmdi zmdi-view-dashboard"></i> <i class="zmdi zmdi-chevron-right"></i>  Dashboard


        </div>
        <div class="row adminContent">
            <div class="col-6 no-padding">
                <div class="card" style="min-height: 200px">
             <div class="card-body">
                    <h5 class="card-title">Current Projects</h5>
                    <p id="activeMessage" style="font-size: 16px; display: none">Active projects assigned to you:</p>
                    <ul id="active">
                        @foreach ($category->project as $project)
                            @if ($project->user_id === Auth::user()->id)
                                <li><a href="{{ route('projects.show', [$project->slug]) }}">{{ $project->title }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <p id="noActive" style="font-size: 16px; display: none">No active projects assigned to you.</p>
            </div>
        </div>
            </div>
            <div class="col-6">
                <div class="card" style="min-height: 200px">
             <div class="card-body">
                    <h5 class="card-title">Upcoming Projects</h5>
                    <p id="upMessage" style="font-size: 16px; display: none">Upcoming projects assigned to you:</p>
                    <ul id="upcoming">
                        @foreach ($upcoming->project as $project)
                        @if ($project->user_id === Auth::user()->id)
                               <li ><a href="{{ route('projects.show', [$project->slug]) }}">{{ $project->title }}</a></li>
                        @endif
                        @endforeach
                    </ul>
                    <p id="noUpcoming" style="font-size: 16px; display: none">No upcoming projects assigned to you.</p>
            </div>
        </div>
            </div>
        </div>

    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<Script>
    $(document).ready(function () {
        if($( "#active li" ).length == 0){
            $("#noActive").css({ display: "block" });
        }else
            $("#activeMessage").css({ display: "block" });

         if($( "#upcoming li" ).length == 0){
            $("#noUpcoming").css({ display: "block" });
        } else
            $("#upMessage").css({ display: "block" });

});

</Script>
@endsection
