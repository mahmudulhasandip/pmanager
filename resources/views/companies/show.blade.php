@extends('layouts.app')

@section('content')

            <div class="row">
                <div class="col-sm-9">
                    <!-- Jumbotron -->
                    <div class="jumbotron">
                        <h1>{{ $company->name }}</h1>
                        <p class="lead">{{ $company->description }}</p>
                        {{--  <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>  --}}
                    </div>

                    <!-- Example row of columns -->
                    <div class="thumbnail" style="padding: 30px;">
                        <div class="row"> 
                            @foreach($company->projects as $project)
                            <div class="col-lg-4">
                                <h2>{{ $project->name }}</h2>
                                <p>{{ $project->description }}</p>
                                <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View Project »</a></p>
                            </div>
                            @endforeach
                        </div>  
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="thumbnail" style="padding: 30px;">
                        <div class="sidebar-module">
                        <h4>Actions</h4>
                        <ol class="list-unstyled">
                            <li><a href="/companies/{{ $company->id }}/edit">Edit</a></li>
                            <li><a href="/projects/create/{{ $company->id }}">Add Project</a></li>
                            <li><a href="/companies">My Companies</a></li>
                            <li><a href="/companies/create">Creat New Company</a></li>

                            <br>
                            <li>
                                <a href="#" onclick="
                                    var result = confirm('Are you sure!!');
                                    if(result){
                                        {{--  event.preventdefault();  --}}
                                        document.getElementById('delete-form').submit();
                                    }
                                ">Delete</a>
                                <form id='delete-form' action="{{ route('companies.destroy', [$company->id]) }}" method='post' style="display: none;">
                                    
                                    <input type="hidden" name='_method' value='delete'>
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            {{--  <li><a href="#">Add new member</a></li>  --}}
                        </ol>
                        </div>
                    </div>
                </div>
            </div>
@endsection