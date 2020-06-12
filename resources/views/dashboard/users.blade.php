@extends('layouts.app')

@section('content')

   @include('layouts.sideNav')

    <div class="navContent">
         <div class="subBar">
            <i class="zmdi zmdi-view-dashboard"></i> <i class="zmdi zmdi-chevron-right"></i>  Dashboard


        </div>



    <div class="card adminContent">
         <!-- Admin View -->
       @if (Auth::user() && Auth::user()->role_id === 1)

         <h1>Users</h1>

         <div class="row">
            @foreach ($users as $user)
                <div class="col-3">
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
                                        <button class="btn btn-primary btn-block mb-1" type="submit">Update</button>
                                        {{ csrf_field() }}
                        </form>
                        <form action="{{ route('users.destroy', $user) }}" method="post">
                            {{ method_field('delete') }}
                            <button class="btn btn-danger btn-block" type="submit">Delete</button>
                            {{ csrf_field() }}
                        </form>

                </div>
            @endforeach
         </div>





    </div>
    @endif









    @if(Auth::user() && Auth::user()->role_id === 2 || Auth::user()->role_id === 3)
     <h1>Users</h1>
        @foreach ($users as $user)
            <h5>Name:</h5>{{$user->name}}
            <h5>Email:</h5>{{$user->email}}
            <h5>Created:</h5>{{ $user->created_at->diffForHumans() }}
        @endforeach
    @endif
    </div>


@endsection
