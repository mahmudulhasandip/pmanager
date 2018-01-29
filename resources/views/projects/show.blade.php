@extends('layouts.app')

@section('content')

            <div class="row">
                <div class="col-sm-9">
                    <!-- Jumbotron -->
                    <div class="well well-lg">
                        <h1>{{ $project->name }}</h1>
                        <p class="lead">{{ $project->description }}</p>
                        {{--  <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>  --}}
                    </div>

                    <!-- Example row of columns -->
                    <div class="thumbnail" style="padding: 30px;">
                        <div class="row"> 
                            {{--  @foreach($project->projects as $project)
                            <div class="col-lg-4">
                                <h2>{{ $project->name }}</h2>
                                <p>{{ $project->description }}</p>
                                <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View Project »</a></p>
                            </div>
                            @endforeach  --}}
                        </div>  
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="thumbnail" style="padding: 30px;">
                        <div class="sidebar-module">
                        <h4>Actions</h4>
                        <ol class="list-unstyled">
                            <li><a href="/projects/{{ $project->id }}/edit">Edit</a></li>
                            <li><a href="/projects/create">Creat New Project</a></li>
                            <li><a href="/projects">My Projects</a></li>
                            

                            <br>
                            <li>
                                <a href="#" onclick="
                                    var result = confirm('Are you sure!!');
                                    if(result){
                                        {{--  event.preventdefault();  --}}
                                        document.getElementById('delete-form').submit();
                                    }
                                ">Delete</a>
                                <form id='delete-form' action="{{ route('projects.destroy', [$project->id]) }}" method='post' style="display: none;">
                                    
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