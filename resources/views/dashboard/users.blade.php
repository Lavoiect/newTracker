@extends('layouts.app')

@section('content')

@include('layouts.sideNav')
<div class="row">
    <div class="col-3">@yield('sideNav')</div>
    <div class="col-3">
       <!-- User View -->
           <h1>Users</h1>
                   @foreach ($users as $user)

    <form action="{{ route('users.update', $user->id)}}" method="post">
        {{ method_field('patch') }}
        <div class="form-group">
            <label for="">Name:</label>
        <input class="form-control" value="{{ $user->name }}" disabled>
        </div>
        <div class="form-group">
            <label for="">Email:</label>
        <input class="form-control" value="{{ $user->email }}" disabled>
        </div>
        <div class="form-group">
                <label for="">User Role</label>
                <select name="role_id" class="form-control">
                <option selected>{{$user->role->name}}</option>
                <option value="1">Admin</option>
                <option value="2">User</option>
                </select>

        </div>

         <div class="form-group">
             <label for="">Created</label>
        <input class="form-control" value="{{ $user->created_at->diffForHumans() }}" disabled>
        </div>
        <button class="btn btn-primary" type="submit">Update</button>
        {{ csrf_field() }}
    </form>
<form action="{{ route('users.destroy', $user) }}" method="post">
     {{ method_field('delete') }}
        <button class="btn btn-danger" type="submit">Delete</button>
         {{ csrf_field() }}
    </form>
                 @endforeach

    </div>
</div>

@endsection
