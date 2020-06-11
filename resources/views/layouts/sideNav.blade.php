
<div class="sideNav">


        @if (Auth::user() && Auth::user()->role_id === 1)
        <div class="addProject">
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
                <a href="{{ route('projects.create') }}">
                    <span class="zmdi-hc-stack zmdi-hc-lg">
                            <i class="zmdi zmdi-circle zmdi-hc-stack-2x"></i>
                            <i class="zmdi zmdi-plus zmdi-hc-stack-1x zmdi-hc-inverse"></i>
                        </span></a>
                </div>
        @endif


<div >
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link active" href="{{ route('dashboard.home', 'Active' ) }}"><i class="zmdi zmdi-view-dashboard"></i></a></li>
            <li class="nav-item"><a class="nav-link activ"e href="{{ route('projects') }}"><i class="zmdi zmdi-assignment"></i> <span class="badge">{{ $projects->count() }}</span></a></li>
            @if (Auth::user() && Auth::user()->role_id === 1)
            <li class="nav-item"><a class="nav-link active" href="{{ route('users') }}"><i class="zmdi zmdi-accounts"></i></a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('intake.messages') }}"><i class="zmdi zmdi-comment"></i>
                        @if($intakes->count() > 0)
                        <span class="badge">{{ $intakes->count() }}</span>
                        @endif
                    </a></li>
            @endif

            @if (Auth::user() && Auth::user()->role_id === 1)
                <li class="nav-item"><a class="nav-link active" href="{{ route('admin.index') }}">

<i class="zmdi zmdi-settings"></i>

</a></li>
            @endif
        </ul>
</div>
</div>





