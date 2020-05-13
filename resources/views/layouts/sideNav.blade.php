
<a href="{{ route('projects.create') }}" class="btn btn-success">Add Project</a>
<ul>
<li><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
<li><a href="{{ route('projects') }}">projects <span class="badge">{{ $projects->count() }}</span></a></li>
    <li><a href="{{ route('users') }}">Users</a></li>
    <li>Milestones</li>
    <li>Daily Catch up</li>
    @if (Auth::user() && Auth::user()->role_id === 1)
         <li><a href="{{ route('admin.index') }}">Admin</a></li>
    @endif

</ul>


