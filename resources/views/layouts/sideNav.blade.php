
<div class="sideNav">

<div class="addProject">
        @if (Auth::user() && Auth::user()->role_id === 1)
              <!--  <li class="nav-item dropdown">
                   <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="zmdi-hc-stack zmdi-hc-lg">
                            <i class="zmdi zmdi-circle zmdi-hc-stack-2x"></i>
                            <i class="zmdi zmdi-plus zmdi-hc-stack-1x zmdi-hc-inverse"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item"href="{{ route('projects.create') }}">Add Project</a>
                    </div>

                </li>-->
                <a class="btn btn-primary" href="{{ route('projects.create') }}">Add Project</a>
        @endif


    </div>


<div class="nav">
        <ul>
            <li><a href="{{ route('dashboard.home', 'Active' ) }}">Dashboard</a></li>
            <li><a href="{{ route('projects') }}">projects <span class="badge">{{ $projects->count() }}</span></a></li>
            <li><a href="{{ route('users') }}">Users</a></li>
            <li>Milestones</li>
            <li>Daily Catch up</li>

            @if (Auth::user() && Auth::user()->role_id === 1)
                <li><a href="{{ route('admin.index') }}">Admin</a></li>
            @endif
        </ul>
</div>
</div>





