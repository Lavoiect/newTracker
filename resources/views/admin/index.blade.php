@extends('layouts.app')
@section('content')

@include('layouts.sideNav')

    <div class="navContent">
        <div class="subBar">
        <i class="zmdi zmdi-settings"></i> <i class="zmdi zmdi-chevron-right"></i>Admin Panel
    </div>

             <div class="adminContent">
                 <div class="row">
                    <div class="col-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Add Project</h5>
                                <h2 class="card-text text-success">{{ $projects->count() }}</h2>
                                <p class="text-muted">Active Projects</p>
                                <a href="{{route('projects.create')}}" class="card-link">Create Project</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Trash</h5>
                                <h2 class="card-text text-danger">{{ $trashedProjects->count() }}</h2>
                                <p class="text-muted">Trashed Projects</p>
                                <a href="{{route('projects.trash')}}" class="card-link">View Trashed Projects</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Tracker Tabs</h5>
                                <h2 class="card-text text-info">{{ $tabs->count() }}</h2>
                                <p class="text-muted">Current tabs</p>
                                <a href="{{route('categories.index')}}" class="card-link">Manage Tabs</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Drafts</h5>
                                <h2 class="card-text text-warning">{{ $draftProjects->count() }}</h2>
                                <p class="text-muted">Unpublished Projects</p>
                                <a href="{{route('admin.projects')}}" class="card-link">Publish</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
</div>


@endsection
