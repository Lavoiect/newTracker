@extends('layouts.app')
@section('content')

@include('layouts.sideNav')


<div class="navContent">
         <div class="subBar">
            <i class="zmdi zmdi-comment"></i> <i class="zmdi zmdi-chevron-right"></i>Intake Requests
    </div>
    <div class="card adminContent">

        <h3 class="mt-3 mb-3 ml-3">Intake Requests</h3>
         @if($intakes->count() === 0)
            <p class="text-center">No intake forms submitted</p>
            @endif

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
        <div class="col-6"><h4>Initiative Name</h4> {{$intake->projectName}} itake date {{$intake->created_at}}</div>
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

        @if($intake->attach)
    <a href="/images/intake_attachments/{{ $intake->attach }}">Attachment</a>
        @endif
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

<form name="intakeForm" action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
    <div class="hidden">
        <div class="row">
    <div class="col-6">
    <input type="text" name="intakeDate" value="{{$intake->created_at}}">
    <div class="form-group">
        <label for="projectName">Initiative Name:</label>
    <input name="title" required type="text" class="form-control" minlength="5" value="{{$intake->projectName}}">
    </div>
  </div>
  <div class="col-6">
    <div class="form-group">
        <label >Due Date:</label>
        <input name="dueDate" type="date" class="form-control" value="{{$intake->dueDate}}">
    </div>
  </div>

    </div>
    <div class="row">
      <div class="form-group col-6">
        <label for="submittedBy">Submitted By:</label>
        <input name="submittedBy" required type="text" class="form-control" value="{{$intake->submittedBy}}">
      </div>
      <div class="form-group col-6">
        <label for="contactEmail">Contact Email:</label>
        <input type="text" class="form-control" name="contactEmail" required value="{{$intake->contactEmail}}">
      </div>

    </div>
    <div class="row">
      <div class="form-group col-6">
        <label for="sme">Subject Matter Expert:</label>
        <input type="text" class="form-control" name="sme" value="{{$intake->sme}}">
      </div>
      <div class="form-group col-6">
        <label for="SME">Stakeholder:</label>
        <input type="text" class="form-control" name="stakeholder" value="{{$intake->stakeholder}}">
      </div>
    </div>


<div class="row">
  <div class="col-3">
    <label for="requestType">Request Type:</label>
    <select class="form-control" name="requestType" class="requestType" onchange="showType()" id="requestType">
      <option>Choose type of Training</option>
    <option selected>{{$intake->requestType}}</option>
      <option>New</option>
      <option>Update</option>
    </select>
  </div>
</div>






<!-- New Training Section-->
<div id="new">
  <div class="row">
    <div class="form-group col-4">
      <label for="projectScope">Project Scope:</label>
     <textarea class="form-control" name="scope" cols="30" rows="5">{{$intake->projectScope}}</textarea>
    </div>
</div>
  <div class="row">
    <div class="col-3">
      <label for="">Does this training align with any performace metric?</label>
      <select class="form-control" name="performMetric">
        <option>Yes</option>
        <option>No</option>
      </select>
    </div>
  </div>

  <p>What areas for the training?</p>

    <input type="checkbox" name="regions[]" value="All"><label for="">All</label>
    <input type="checkbox" name="regions[]" value="Northwest"><label for="">Northwest</label>
    <input type="checkbox" name="regions[]" value="Southwest"><label for="">Southwest</label>
    <input type="checkbox" name="regions[]" value="Great Lakes"><label for="">Great Lakes</label>
    <input type="checkbox" name="regions[]" value="Southern Ohio"><label for="">Southern Ohio</label>
    <input type="checkbox" name="regions[]" value="South"><label for="">South</label>
    <input type="checkbox" name="regions[]" value="West"><label for="">West</label>
    <input type="checkbox" name="regions[]" value="Central"><label for="">Central</label>
    <input type="checkbox" name="regions[]" value="Texas"><label for="">Texas</label>
    <input type="checkbox" name="regions[]" value="Carolinas"><label for="">Carolinas</label>
    <input type="checkbox" name="regions[]" value="Florida"><label for="">Florida</label>





    </div><!-- End of new training section -->

    <!-- Update Section of form -->
    <div id="update">
    <div class="form-group col-md-5">
        <label>What needs updating:</label>
        <input name="whatUpdate"  type="text" class="form-control" value="{{$intake->updateName}}">
      </div>
      <div class="form-group col-md-5">
        <label for="submittedBy">Please Describe:</label>
        <input name="describe" type="text" class="form-control" value="{{$intake->whyUpdate}}">
      </div>
      <div class="form-group col-md-5">
        <label for="fcid">FCID(if known):</label>
        <input name="fcid" type="text" class="form-control" value="{{$intake->fcid}}">
      </div>

    </div>

    <input type="file" name="attachment" id="file">
    <!--
    <input type="file" name="attach2" id="attach2" onchange="contentChange('attach3')">
    <input type="file" name="attach3" id="attach3" onchange="contentChange('attach4')">
    <input type="file" name="attach4" id="attach4" onchange="contentChange('attach5')">
    <input type="file" name="attach5" id="attach5">
-->

    </div>

    <button type="submit" class="btn btn-primary">Add to Tracker</button>
     {{ csrf_field() }}
  </form>

<form method="post" action="{{  route('intake.delete', $intake->id) }}">
    {{ method_field('delete') }}
    <button class="btn btn-danger" type="submit">Delete Intake</button>
    {{ csrf_field() }}
</form>













      </div>
    </div>
  </div>
 @endforeach
</div>
<div class="mt-2"></div>

    </div>
</div>

@endsection
