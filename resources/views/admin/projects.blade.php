@extends('layouts.app')

@section('content')
@include('partials.meta_static')
@include('layouts.sideNav')
<div class="row">
    <div class="col-3 no-padding">@yield('sideNav')</div>
    <div class="col-3">

        <div class="row">
            <div class="col-6">
                <h1>Published Projects</h1>

           <table class="table">
               <thead>
                 <tr>
                   <th scope="col">#</th>
                   <th scope="col">First</th>
                   <th scope="col">Last</th>
                   <th scope="col">Handle</th>
                 </tr>
               </thead>
               <tbody>
                   @foreach ($publishedProjects as $project)
                 <tr>
                   <th scope="row">{{ $project->id }}
                <form action="{{ route('projects.update', $project->id) }}" method="post">
                    {{ method_field('patch') }}
                        <input name="status" type="checkbox" value="0" checked style="display: none">
                        <button class="btn btn-success" type="submit">Move to drafts</button>
                    {{ csrf_field()}}
                </form>
                </th>
                 <td><a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a></td>
                   <td>{!! $project->body !!}</td>


                   <td>{{ $project->attachment }}</td>
                 </tr>
                 @endforeach

               </tbody>
             </table>
            </div>
            <div class="col-6">
                 <h1>Draft Projects</h1>

           <table class="table">
               <thead>
                 <tr>
                   <th scope="col">#</th>
                   <th scope="col">First</th>
                   <th scope="col">Last</th>
                   <th scope="col">Handle</th>
                 </tr>
               </thead>
               <tbody>
                   @foreach ($draftProjects as $project)
                 <tr>
                   <th scope="row">{{ $project->id }}
                <form action="{{ route('projects.update', $project->id) }}" method="post">
                    {{ method_field('patch') }}
                        <input name="status" type="checkbox" value="1" checked style="display: none">
                        <button class="btn btn-success" type="submit">Publish</button>
                    {{ csrf_field()}}
                </form>
                </th>
                 <td><a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a></td>
                   <td>{!! $project->body !!}</td>


                   <td>{{ $project->attachment }}</td>
                 </tr>
                 @endforeach

               </tbody>
             </table>

            </div>
        </div>


    </div>
</div>

@endsection
