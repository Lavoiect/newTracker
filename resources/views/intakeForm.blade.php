@extends('layouts.app')

@section('content')
<div class="container-fluid content">
   <section class="welcome">

 @if (session('added'))
             <div class="alert alert-success" role="alert">
                {{ session('added') }}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
            @endif
  <div class="jumbotron">
    <h3>Field Operations Learning Services</h3>
    <h4>Intake and Request Form</h4>
  </div>

  <form name="intakeForm" action="{{ route('intake.store') }}" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-6">
    <div class="form-group">
        <label for="projectName">Initiative Name:</label>
        <input name="projectName" required type="text" class="form-control" minlength="5" maxlength="255">
    </div>
  </div>
  <div class="col-6">
    <div class="form-group">
        <label >Due Date:</label>
        <input name="dueDate" type="date" class="form-control">
    </div>
  </div>

    </div>
    <div class="row">
      <div class="form-group col-6">
        <label for="submittedBy">Submitted By:</label>
        <input name="submittedBy" required type="text" class="form-control" maxlength="255">
      </div>
      <div class="form-group col-6">
        <label for="contactEmail">Contact Email:</label>
        <input type="text" class="form-control" name="contactEmail" required maxlength="255">
      </div>

    </div>
    <div class="row">
      <div class="form-group col-6">
        <label for="sme">Subject Matter Expert:</label>
        <input type="text" class="form-control" name="sme" maxlength="255">
      </div>
      <div class="form-group col-6">
        <label for="SME">Stakeholder:</label>
        <input type="text" class="form-control" name="stakeholder" maxlength="255">
      </div>
    </div>


<div class="row">
  <div class="col-3">
    <label for="requestType">Request Type:</label>
    <select class="form-control" name="requestType" class="requestType" onchange="showType()" id="requestType">
      <option>Choose type of Training</option>
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
     <textarea class="form-control" name="projectScope" id="" cols="30" rows="5"></textarea>
    </div>
</div>
  <div class="row">
    <div class="col-3">
      <label for="">Does this training align with any performance metric?</label>
      <select class="form-control" name="performMetric" maxlength="255">
        <option>Yes</option>
        <option>No</option>
      </select>
    </div>
  </div>

  <p>What areas for the training?</p>

    <input type="checkbox" name="regions[]" value="All"><label for="">All</label>
    <input type="checkbox" name="regions[]" value="Northeast"><label for="">Northeast</label>
    <input type="checkbox" name="regions[]" value="Northwest"><label for="">Northwest</label>
    <input type="checkbox" name="regions[]" value="Great Lakes"><label for="">Great Lakes</label>
    <input type="checkbox" name="regions[]" value="Southern Ohio"><label for="">Southern Ohio</label>
    <input type="checkbox" name="regions[]" value="South"><label for="">South</label>
    <input type="checkbox" name="regions[]" value="West"><label for="">West</label>
    <input type="checkbox" name="regions[]" value="Central"><label for="">Central</label>
    <input type="checkbox" name="regions[]" value="Texas"><label for="">Texas</label>
    <input type="checkbox" name="regions[]" value="Carolinas"><label for="">Carolinas</label>
    <input type="checkbox" name="regions[]" value="Florida"><label for="">Florida</label>
    <input type="checkbox" name="regions[]" value="NYC"><label for="">NYC</label>

    </div><!-- End of new training section -->

    <!-- Update Section of form -->
    <div id="update">
    <div class="form-group col-md-5">
        <label for="submittedBy">What needs updating:</label>
        <input name="updateName"  type="text" class="form-control" maxlength="255">
      </div>
      <div class="form-group col-md-5">
        <label for="submittedBy">Please Describe:</label>
        <input name="whyUpdate" type="text" class="form-control" maxlength="255">
      </div>
      <div class="form-group col-md-5">
        <label for="fcid">FCID(if known):</label>
        <input name="fcid" type="text" class="form-control"maxlength="255">
      </div>

    </div>

    <input type="file" name="attach">
    <!--
    <input type="file" name="attach2" id="attach2" onchange="contentChange('attach3')">
    <input type="file" name="attach3" id="attach3" onchange="contentChange('attach4')">
    <input type="file" name="attach4" id="attach4" onchange="contentChange('attach5')">
    <input type="file" name="attach5" id="attach5">
-->


    <button type="submit" class="btn btn-primary">Submit Intake</button>
     {{ csrf_field() }}
  </form>

  <p id="size"></p>
</section>


</div>
@endsection
