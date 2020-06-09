@extends('layouts.app')

@section('content')

@include('layouts.sideNav')
<div class="navContent">
    <div class="subBar">
            <i class="zmdi zmdi-view-dashboard"></i> <i class="zmdi zmdi-chevron-right"></i>Projects


        </div>



<div class="card adminContent">
    <div class="container">
        <h1>{{ $category->name }}</h1>
         <ul class="nav nav-pills">
             <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tabs</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('projects') }}" class="dropdown-item">All</a>
                         @foreach ($categories as $cat)
                            <a href="{{ route('categories.noEdit', $cat->slug) }}" class="dropdown-item">{{ $cat->name }}</a>
                        @endforeach
                    </div>
                </li>

        </ul>

    <table
        id="table"
        data-toggle="table"
        data-height="460"
        data-search="true"
        data-pagination="true"
    >
               <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Project Lead</th>
                        <th scope="col">Stakeholder</th>
                        <th scope="col">Due Date</th>
                    </tr>
               </thead>
               <tbody>
                   @foreach ($category->project as $project)
                <tr>
                     <td>
                         <ul class="nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="zmdi-hc-stack zmdi-hc-lg">
                                    <i class="zmdi zmdi-circle-o zmdi-hc-stack-2x"></i>
                                    <i class="zmdi zmdi-chevron-down zmdi-hc-stack-1x"></i>
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('projects.edit', [$project->slug]) }}">Edit</a>
                                    <a class="dropdown-item" href="{{ route('projects.show', [$project->slug]) }}">Details</a>
                                   <form method="post" action="{{  route('projects.delete', $project->id) }}">
                                        {{ method_field('delete') }}
                                        <button class="dropdown-item" type="submit">Delete</button>
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                         </ul>

                     </td>
                    <td>
                        <a href="{{ route('projects.show', [$project->slug]) }}">{{ $project->title }}</a>
                    </td>
                    <td>
                        @if($project->user)
                        <a href="{{ route('showUsers', $project->user) }}">{{ $project->user->name }}</a>
                     @endif
                    </td>
                    <td>
                         {{ $project->stakeholder }}
                    </td>
                <td>
                   {{ $project->dueDate }}
                </td>

                 </tr>

                 @endforeach

               </tbody>
             </table>

</div>
</div>
 </div>







@endsection
