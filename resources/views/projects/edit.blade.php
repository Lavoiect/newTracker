@extends('layouts.app')

@section('content')
@include('partials.editor')
    Edit Project:

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
                    <label for="body">Body</label>
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
        <div class="form-group form-check form-check-inline">
            {{ $project->category->count() ? 'Current Tab' : '' }}
            @foreach ($project->category as $cat)
        <label for="">{{ $cat->name }}</label>
        <input type="checkbox" value="{{ $cat->id }}" name="category_id[]" class="form-chech-input" checked>
            @endforeach
        </div>

        <div class="form-group form-check form-check-inline">
            {{ $filtered->count() ? 'Unused Tab' : '' }}
            @foreach ($filtered as $cat)
        <label for="">{{ $cat->name }}</label>
        <input type="checkbox" value="{{ $cat->id }}" name="category_id[]" class="form-chech-input">
            @endforeach
        </div>

        <button class="btn btn-primary" type="submit">Update project</button>
        {{ csrf_field() }}
    </form>


@endsection
