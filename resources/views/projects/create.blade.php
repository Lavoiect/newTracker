@extends('layouts.app')

@section('content')
@include('partials.editor')
    Add Project:

<form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">

    @if (count($errors))
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
        <li>{{ $err }}</li>
            @endforeach
        </div>
    @endif
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="body">Body</label>
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

        <div class="form-group form-check form-check-inline">
            @foreach ($categories as $cat)
        <label for="">{{ $cat->name }}</label>
        <input type="checkbox" value="{{ $cat->id }}" name="category_id[]" class="form-chech-input">
            @endforeach
        </div>

        <button class="btn btn-primary" type="submit">Create project</button>
        {{ csrf_field() }}
    </form>


@endsection
