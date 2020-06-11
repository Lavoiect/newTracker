@extends('layouts.app')

@section('content')
<div id="loader" class="center"></div>
<div class="container-fluid content">

<section class="welcome">
<h1>All Projects</h1>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">All</a>
  </li>
   @foreach ($categories as $cat)
  <li class="nav-item">
      <a  class="nav-link" href="{{ route('tabs.filtered', $cat->slug) }}">{{ $cat->name }}</a>
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


        @foreach ($projects as $project)
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

            @elseif (strtotime($today) - strtotime($project->dueDate) <= -18804 && strtotime($today) - strtotime($project->dueDate) >= -191604)
                <span class="badge badge-warning">Due this week</span>

            @else
                <span class="badge badge-success">On Track</span>

        @endif
        </th>


        <td>
            <a href="{{ route('project.show', [$project->slug]) }}">{{ $project->title }}</a>
        </td>
        <td>
            @if($project->user)
            {{ $project->user->name }}
            @endif
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
</section>

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
