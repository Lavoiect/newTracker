@extends('layouts.app')

@section('content')
@include('partials.editor')

@include('layouts.sideNav')

<div class="navContent">
         <div class="subBar">
         <a href="{{route('admin.index')}}"><i class="zmdi zmdi-settings"></i></a>  <i class="zmdi zmdi-chevron-right"></i>
            <i class="zmdi zmdi-collection-plus"></i> <i class="zmdi zmdi-chevron-right"></i>Create Project
    </div>
    <div class="card adminContent">
        <div class="container">
    Add Project:

<form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">

    @if (count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
        <li>{{ $err }}</li>
            @endforeach
        </div>
    @endif
   <div class="form-group">
    <label>Project Lead</label>
    <select class="form-control" id="exampleFormControlSelect1"  name="user_id">
        <option></option>
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach

    </select>
  </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="title">Subject Matter Expert</label>
                    <input type="text" class="form-control" name="sme">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="body">Project Notes</label>
                    <textarea name="body" class="form-control my-editor">{!! old('body') !!}</textarea>
                </div>
            </div>
        </div>

         <div class="form-group">
            <label>
                <span class="btn btn-outline btn-small btn-info">Attachnent</span>
                <input type="file" name="attachment" class="form-control" hidden>
            </label>

        </div>

         <div class="form-group">
                    <label for="scope">Project Scope</label>
                    <textarea name="scope" class="form-control"></textarea>
        </div>
        <div class="form-group">
                    <label for="dueDate">Due Date</label>
                    <input type="date" name="dueDate" class="form-control">
        </div>
        <div class="form-group">
                    <label for="submittedBy">Submitted By</label>
                    <input type="text" name="submittedBy" class="form-control">
        </div>
        <div class="form-group">
                    <label for="stakeholder">Stakeholder</label>
                    <input type="text" name="stakeholder" class="form-control">
        </div>


<hr>
<!--
@foreach ($categories as $cat)
 <div class="custom-control custom-radio">
  <input type="radio" id="{{ $cat->id }}" name="category_id" class="custom-control-input" value="{{ $cat->id }}">
  <label class="custom-control-label" for="{{ $cat->id }}">{{ $cat->name }}</label>
</div>
@endforeach

-->

<div class="form-group form-check form-check-inline ">
            @foreach ($categories as $cat)
        <label class="{{$cat->id == 3 ? 'hide' : ''}}" for="">{{ $cat->name }}</label>
        <input type="checkbox" value="{{ $cat->id }}" name="category_id[]" class="form-chech-input {{$cat->id == 3 ? 'hide' : ''}}">
            @endforeach
        </div>


        <button class="btn btn-primary" type="submit">Create project</button>
        {{ csrf_field() }}
    </form>
        </div>
    </div>
</div>
@endsection
