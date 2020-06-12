@extends('layouts.app')
@include('partials.meta_static')

@section('content')


    @include('layouts.sideNav')

    <div class="navContent">
         <div class="subBar">
            <i class="zmdi zmdi-view-dashboard"></i> <i class="zmdi zmdi-chevron-right"></i>Projects
    </div>

    <div class="card adminContent">
        <div class="container">
             @if (session('status'))
            <div class="alert alert-succes">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
        @endif



           <h1>All Projects</h1>

           <ul class="nav nav-pills">
             <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tabs</a>
                    <div class="dropdown-menu">
                         @foreach ($categories as $cat)
                            <a href="{{ route('categories.noEdit', $cat->slug) }}" class="dropdown-item" href="#">{{ $cat->name }}</a>
                        @endforeach
                    </div>
                </li>

        </ul>
 <div id="loader" class="center"></div>
        <div class="myTable">


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
                   @foreach ($projects as $project)
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
                                    <a class="dropdown-item" href="{{ route('projects.show', [$project->slug]) }}">Details</a>
                                     @if (Auth::user() && Auth::user()->role_id === 1 || Auth::user()->role_id === 2 && Auth::user()->id === $project->user_id)
                                        <a class="dropdown-item" href="{{ route('projects.edit', [$project->slug]) }}">Edit</a>
                                     @endif

                                     @if (Auth::user() && Auth::user()->role_id === 1)
                                        <form method="post" action="{{  route('projects.delete', $project->id) }}">
                                                    {{ method_field('delete') }}
                                                    <button class="dropdown-item" type="submit">Delete</button>
                                                    {{ csrf_field() }}
                                            </form>
                                     @endif



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
    </div>

     <script>
        document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector(
                  ".myTable").style.visibility = "hidden";
                document.querySelector(
                  "#loader").style.visibility = "visible";
            } else {
                document.querySelector(
                  "#loader").style.display = "none";
                document.querySelector(
                  ".myTable").style.visibility = "visible";
            }
        };
    </script>
@endsection

