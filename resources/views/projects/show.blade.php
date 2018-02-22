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
                    <div class="thumbnail comment-wrap" style="padding: 30px;">
                        <div class="row"> 
                            {{--  @foreach($project->projects as $project)
                            <div class="col-lg-4">
                                <h2>{{ $project->name }}</h2>
                                <p>{{ $project->description }}</p>
                                <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" role="button">View Project »</a></p>
                            </div>
                            @endforeach  --}}


                            <div class="comments">
                                <div class="comment-wrap">
                                        <div class="photo">
                                                {{--  <div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg')"></div>  --}}
                                                <div class="avatar" style="margin-left: -10px;" ><i class='pe-7s-user pe-3x'></i></div>
                                        </div>
                                        <div class="comment-block">
                                                <form action="{{route('comments.store')}}" method='post'>
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name='commentable_type' value='App\Project'>
                                                    <input type="hidden" name='commentable_id' value='{{$project->id}}'>
                                                    <textarea name="body" id="" cols="30" rows="3" placeholder="Add comment..."></textarea>
                                                    <input type="text" name='url' placeholder='Url' >
                                                    <button type="submit" class='btn btn-primary pull-right' name='submit' >Comment</button>
                                                </form>
                                        </div>
                                </div>


                                {{--  comment section included form partial folder  --}}
                                @include('partials.comments')
                        </div>
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
                    <hr>
                    {{--  add user to project  --}}
                    <div class="thumbnail" style="padding: 30px;">
                        <h4>Add User</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="add-user" action="{{route('projects.adduser')}}" method='post'>
                                    {{ csrf_field() }}

                                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Email" name="email">
                                        
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">Add</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </form>
                                <hr>
                                <ol class="list-unstyled">
                                    @foreach($project->users as $user)
                                    <li><a href="#"> {{ $user->email }} </a></li>
                                    @endforeach
                                </ol>
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /.row -->
                    </div>
                </div>
            </div>
@endsection