@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-3">@include('layouts.sideNav')
</div>
    <div class="col-9">
        <h3>Tabs:</h3>
        <div class="row">
             @foreach ($categories as $cat)
            <div class="col-2"><a href="{{ route('categories.noEdit', $cat->slug) }}">{{ $cat->name }}</a></div>
            @endforeach
        </div>

           <h1>{{ $category->name }}</h1>

           <table class="table">
               <thead>
                 <tr>
                   <th scope="col">Created</th>
                   <th scope="col">Project Name</th>
                   <th scope="col">Notes</th>
                   <th scope="col">Atachment</th>
                 </tr>
               </thead>
               <tbody>
                   @foreach ($category->project as $project)

 <tr>
                   <th scope="row">{{ $project->created_at->diffForHumans() }}</th>
                 <td><a href="{{ route('projects.show', [$project->slug]) }}">{{ $project->title }}</a></td>
                   <td>{!! \Illuminate\Support\Str::limit($project->body, 30) !!}</td>
                   <td>{{ $project->attachment }}</td>
                 </tr>


                 @endforeach

               </tbody>
             </table>

    </div>
</div>

@endsection
