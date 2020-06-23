@extends('layouts.app')

@section('content')
@include('layouts.sideNav')

<div class="navContent">
          <div class="subBar">
             <a href="{{route('admin.index')}}"><i class="zmdi zmdi-settings"></i></a>  <i class="zmdi zmdi-chevron-right"></i>
    <a href="{{route('categories.index')}}"><i class="zmdi zmdi-tab"></i></a>  <i class="zmdi zmdi-chevron-right"></i><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a>
    <i class="zmdi zmdi-chevron-right"></i>Edit
    </div>
    <div class="card adminContent">
        <div class="container">
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

        </div>


@endsection
