@extends('layouts.app')

@section('content')
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
        <td>{{ $project->title }}</td>
        <td>{{ $project->body }}</td>
        <td>{{ $project->attachment }}</td>
      </tr>
      @endforeach

    </tbody>
  </table>
@endsection
