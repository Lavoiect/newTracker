@extends('layouts.app')
@include('partials.meta_static')

@section('content')

<div class="row">
    @include('layouts.sideNav')
    <div class="col-10">
        @if (session('status'))
            <div class="alert alert-succes">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
        @endif
        <h3>Tabs:</h3>



        <div class="row">
             @foreach ($categories as $cat)
            <div class="col-2"><a href="{{ route('categories.noEdit', $cat->slug) }}">{{ $cat->name }}</a></div>
            @endforeach
        </div>

           <h1>All Projects</h1>

           <table class="table">
               <thead>
                 <tr>
                   <th scope="col">Due Date</th>
                   <th scope="col">Project Name</th>
                   <th scope="col">Project Scope</th>
                   <th scope="col">Project Lead</th>
                   <th scope="col">Submitted By</th>
                 </tr>
               </thead>
               <tbody>
                   @foreach ($projects as $project)
                 <tr>
                   <th scope="row">{{ $project->dueDate }}</th>
                 <td>
                     <a href="{{ route('projects.show', [$project->slug]) }}">{{ $project->title }}</a></td>
                <td>
                    {!! \Illuminate\Support\Str::limit($project->scope, 50) !!}</td>
                 <td>
                      @if($project->user)
                        <a href="{{ route('showUsers', $project->user) }}">{{ $project->user->name }}</a>
                     @endif
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

@endsection

