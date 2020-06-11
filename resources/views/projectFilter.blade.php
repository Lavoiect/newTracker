@extends('layouts.app')

@section('content')
<div id="loader" class="center"></div>
<div class="container-fluid content">
<section class="welcome">
    <h1>{{ $category->name }}</h1>
                <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="/">All</a>
                </li>
                @foreach ($categories as $key=> $cat)
                <li class="nav-item">
                <a  class="nav-link {{$key == $category->id - 1 ? 'active' : ''}}" href="{{ route('tabs.filtered', $cat->slug) }}">{{ $cat->name }}</a>
                </li>
                @endforeach
                </ul>

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
        <th  data-sortable="true" data-field="status">Status</th>
        <th  data-sortable="true" data-field="project">Project</th>
        <th  data-sortable="true">Lead Developer</th>
        <th  data-sortable="true">Scope</th>
        <th  data-sortable="true">Due Date</th>
        <th  data-sortable="true">Submitted By</th>
      </tr>
    </thead>
    <tbody>


        @foreach ($category->project as $project)
      <tr>
        <th scope="row">
            @if($project->isComplete == 1)
                <span class="badge badge-primary">Complete</span>

            @elseif($project->isReview == 1)
                <span class="badge badge-secondary">Under Review</span>

            @elseif (strtotime($project->dueDate) == null)
                <span class="badge badge-info">N/A</span>

            @elseif (strtotime($today) - strtotime($project->dueDate) >= 0 )
                <span class="badge badge-danger">Past Due</span>

            @elseif (strtotime($today) - strtotime($project->dueDate) <= 604800)
                <span class="badge badge-warning">Due this week</span>

            @else
                <span class="badge badge-success">On Track</span>
        @endif
        </th>


        <td>
            <a href="{{ route('projects.show', [$project->slug]) }}">{{ $project->title }}</a>
        </td>
        <td>
            {{ $project->user->name }}
        </td>
        <td>


         {{ $project->scope }}
        </td>
         <td>
            {{ $project->dueDate }}
        </td>
         <td>
            {{ $project->submittedBy }}
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>

</div>


     </div>
</section>
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