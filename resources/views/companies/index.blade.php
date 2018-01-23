
@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">All Companies <a class='pull-right add-company' href="/companies/create">Add company</a></div>
    <div class="panel-body">
        <ul class="list-group">
          @foreach($companies as $company)
            <li class="list-group-item"><a href="/companies/{{ $company->id }}">{{ $company->name }}</a></li>
            @endforeach
          </ul>
    </div>
  </div>

@endsection