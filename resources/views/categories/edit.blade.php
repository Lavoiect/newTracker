@extends('layouts.app')

@section('content')
    Edit Tab:

<form action="{{ route('categories.update', $category->id) }}" method="post">
    {{{ method_field('patch') }}}
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Tab</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                </div>
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Create Tab</button>
        {{ csrf_field() }}
    </form>


@endsection
