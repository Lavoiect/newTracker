@extends('layouts.app')

@section('content')
@include('partials.meta_static')
@include('layouts.sideNav')
<div class="row">
    <div class="col-3">@yield('sideNav')</div>
    <div class="col-3">
        @if (session('status'))
            <div class="alert alert-succes">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
        @endif
        <h3>Tabs:</h3>
        @foreach ($categories as $cat)

       <p><a href="{{ route('categories.noEdit', $cat->slug) }}">{{ $cat->name }}</a></p>
           @endforeach
           <h1>All Projects</h1>

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
                   @foreach ($projects as $project)
                 <tr>
                   <th scope="row">{{ $project->id }}</th>
                 <td><a href="{{ route('projects.show', [$project->slug]) }}">{{ $project->title }}</a></td>
                   <td>{!! \Illuminate\Support\Str::limit($project->body, 50) !!}</td>
                   <td>{{ $project->attachment }}</td>
                 </tr>
                 @endforeach

               </tbody>
             </table>

    </div>
</div>

@endsection

