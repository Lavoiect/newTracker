@extends('layouts.app')
@section('content')

@include('layouts.sideNav')


<div class="navContent">
         <div class="subBar">
            <i class="zmdi zmdi-view-dashboard"></i> <i class="zmdi zmdi-chevron-right"></i>Projects
    </div>
    <div class="card adminContent">

        <h3 class="mt-3 mb-3 ml-3">Intake Requests</h3>

        <div class="accordion" id="accordionExample">
@foreach ($intakes as $intake)
  <div class="card ml-3 mr-3">
    <div class="card-header" id="headingTwo">

      <h2 class="mb-0">

          <form class="ajax" action="{{ route('intake.update', $intake->id) }}" method="post">
                                {{ method_field('patch') }}
                                    <input name="isNew" type="checkbox" value="1" checked style="display: none">
                                   <button id="myDiv"  class="{{ $intake->isNew ==  '0' ? 'highlight' : ''  }} btn btn-link btn-block text-left collapsed" type="submit" data-toggle="collapse" data-target="#collapse_{{ $intake->id }}" aria-expanded="false" aria-controls="collapseTwo">{{$intake->projectName}}</button>
                                {{ csrf_field()}}
            </form>
      </h2>
    </div>
<div id="collapse_{{ $intake->id }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <div class="row">
            <div class="col-6"><h4>Initiative Name</h4> {{$intake->projectName}}</div>
            <div class="col-6"><h4>Due Date</h4> {{$intake->dueDate}}</div>
        </div>

        <div class="row">
            <div class="col-6"><h4>Submitted By</h4> {{$intake->submittedBy}}</div>
            <div class="col-6"><h4>Contact Email</h4> {{$intake->contactEmail}}</div>
        </div>

         <div class="row">
            <div class="col-6"><h4>Subject Matter Expert</h4> {{$intake->sme}}</div>
            <div class="col-6"><h4>Stakeholder</h4> {{$intake->stakeholder}}</div>
        </div>

        <h4>Request Type</h4>{{$intake->requestType}}

        @if ($intake->requestType === 'New')
            <h4>Project Scope</h4>
            {{$intake->projectScope}}
            <h4>Does this training align with any performce metric?</h4>
            {{$intake->performMetric}}
            <h4>Areas of training</h4>
            {{$intake->regions}}

             @else
                <h4>What needs updating</h4>
                {{$intake->updateName}}
                <h4>Details</h4>
                {{$intake->whyUpdate}}
                <h4>FCID</h4>
                {{$intake->fcid}}
        @endif
      </div>
    </div>
  </div>
 @endforeach
</div>
<div class="mt-2"></div>

    </div>
</div>

@endsection
