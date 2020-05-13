@extends('layouts.app')

@section('content')
    Add Tab:

<form action="{{ route('categories.store') }}" method="post">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Tab</label>
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Create Tab</button>
        {{ csrf_field() }}
    </form>


@endsection
