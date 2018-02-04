
@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">All Projects <a class='pull-right add-company' href="/projects/create">Add New</a></div>
    <div class="panel-body">
        <ul class="list-group">
          @foreach($projects as $projects)
            <li class="list-group-item"><a href="/projects/{{ $projects->id }}">{{ $projects->name }}</a></li>
          @endforeach
        </ul>
    </div>
  </div>

@endsection