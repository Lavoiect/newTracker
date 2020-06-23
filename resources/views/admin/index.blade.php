@extends('layouts.app')
@section('content')

@include('layouts.sideNav')

    <div class="navContent">
        <div class="subBar">
        <i class="zmdi zmdi-settings"></i> <i class="zmdi zmdi-chevron-right"></i>Admin Panel
    </div>

             <div class="card adminContent">
                <div class="card-body">
                    <h5 class="card-title">Admin Panel</h5>
                    <p class="card-text">Use this panel to make changes.</p>
                        <div class="row">
                            <div class="col-3"><a href="{{ route('projects.create') }}">Create Project</a></div>
                            <div class="col-3"><a href="{{ route('projects.trash') }}">Trashed Projects</a></div>
                            <div class="col-3"><a href="{{ route('categories.index') }}">Add Project Tab</a></div>
                            <div class="col-3"><a href="{{ route('admin.projects') }}">Manage Projects</a></div>
                        </div>
                </div>
            </div>
</div>


@endsection
