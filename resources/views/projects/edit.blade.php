@extends('layouts.app')

@section('content')
@include('partials.editor')

@include('layouts.sideNav')

<div class="navContent">
         <div class="subBar">
            <i class="zmdi zmdi-view-dashboard"></i> <i class="zmdi zmdi-chevron-right"></i>Projects
    </div>
    <div class="card adminContent">
        <div class="container">

<div class="card projectCard">
 <h4>Edit Project:</h4>

 <div class="row">
     <div class="col-2"> <form action="{{ route('projects.update', $project->id) }}" method="post">
                    {{ method_field('patch') }}
                        <input name="isComplete" type="checkbox" value="1" checked style="display: none">
                        <input type="checkbox" value="3" name="category_id[]" class="form-chech-input" checked style="display: none">
                        <button class="btn btn-success" type="submit">Complete</button>
                    {{ csrf_field()}}
    </form>
</div>
     <div class="col-2">
            <form action="{{ route('projects.update', $project->id) }}" method="post">
                                {{ method_field('patch') }}
                                    <input name="isReview" type="checkbox" value="1" checked style="display: none">
                                    <button class="btn btn-warning" type="submit">Under Review</button>
                                {{ csrf_field()}}
                </form>
     </div>
 </div>




<form action="{{ route('projects.update', $project->id) }}" method="post" enctype="multipart/form-data">
    {{ method_field('patch') }}

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                    <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $project->title }}">
                </div>
        </div>
        <div class="col-6">
            <div class="form-group">
    <label>Project Lead</label>


    <select class="form-control" id="exampleFormControlSelect1"  name="user_id">
        @if($project->user_id && $project->user->name)
           <option selected value="{{$project->user_id}}">{{$project->user->name}}
        </option>
           @else
            <option selected value="">Selelct a User</option>
        @endif
        <option value=""></option>
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach

    </select>
  </div>
        </div>
    </div>



        <div class="row">
            <div class="col-6">
                 <div class="form-group">
                    <label for="dueDate">Due Date</label>
                    <input type="date" name="dueDate" class="form-control" value="{{$project->dueDate}}">
        </div>

        <div class="form-group">
                    <label for="submittedBy">Submitted By</label>
                    <input type="text" name="submittedBy" class="form-control">
        </div>

        <div class="form-group">
                    <label for="stakeholder">Stakeholder</label>
                    <input type="text" name="stakeholder" class="form-control">
        </div>
            </div>
            <div class="col-6"><div class="form-group">
                    <label for="scope">Project Scope</label>
                    <textarea name="scope" class="form-control" style="height: 210px"></textarea>
        </div></div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="body">Notes</label>
                <textarea name="body" class="form-control my-editor">{!! $project->body !!}</textarea>
                </div>
                <div class="form-group">
            <label>
                <span class="btn btn-outline btn-small btn-info">Attachnent</span>
                <input type="file" name="attachment" class="form-control" hidden>
            </label>

        </div>
    </div>
    </div>


    <div class="row">
        <div class="col-6">
            <h6>{{ $project->category->count() ? 'Current Tab(s)' : '' }}:</h6>
        <div class="form-group form-check form-check-inline">

            @foreach ($project->category as $cat)
        <label for="">{{ $cat->name }}</label>
        <input type="checkbox" value="{{ $cat->id }}" name="category_id[]" class="form-chech-input" checked>
            @endforeach
        </div>
        </div>
    <div class="col-6">
         <h6>{{ $filtered->count() ? 'Unused Tab(s)' : '' }}:</h6>
        <div class="form-group form-check form-check-inline">
            @foreach ($filtered as $cat)
        <label for="">{{ $cat->name }}</label>
        <input type="checkbox" value="{{ $cat->id }}" name="category_id[]" class="form-chech-input">
            @endforeach
        </div>
    </div>
</div>

        <button class="btn btn-primary" type="submit">Update project</button>
        {{ csrf_field() }}
    </form>


</div>
        </div>

    </div>
</div>


@endsection
