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
                                                <div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg')"></div>
                                        </div>
                                        <div class="comment-block">
                                                <form action="{{route('comments.store')}}" method='post'>
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name='commentable_type' value='Project'>
                                                    <input type="hidden" name='commentable_id' value='{{$project->id}}'>
                                                    <textarea name="body" id="" cols="30" rows="3" placeholder="Add comment..."></textarea>
                                                    <input type="text" name='url' placeholder='Url' >
                                                    <button type="submit" class='btn btn-primary pull-right' name='submit' >Comment</button>
                                                </form>
                                        </div>
                                </div>
                        
                                <div class="comment-wrap">
                                        <div class="photo">
                                                <div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg')"></div>
                                        </div>
                                        <div class="comment-block">
                                                <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto temporibus iste nostrum dolorem natus recusandae incidunt voluptatum. Eligendi voluptatum ducimus architecto tempore, quaerat explicabo veniam fuga corporis totam reprehenderit quasi
                                                        sapiente modi tempora at perspiciatis mollitia, dolores voluptate. Cumque, corrupti?</p>
                                                <div class="bottom-comment">
                                                        <div class="comment-date">Aug 24, 2014 @ 2:35 PM</div>
                                                        <ul class="comment-actions">
                                                                <li class="complain">Complain</li>
                                                                <li class="reply">Reply</li>
                                                        </ul>
                                                </div>
                                        </div>
                                </div>
                        
                                <div class="comment-wrap">
                                        <div class="photo">
                                                <div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/felipenogs/128.jpg')"></div>
                                        </div>
                                        <div class="comment-block">
                                                <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto temporibus iste nostrum dolorem natus recusandae incidunt voluptatum. Eligendi voluptatum ducimus architecto tempore, quaerat explicabo veniam fuga corporis totam.</p>
                                                <div class="bottom-comment">
                                                        <div class="comment-date">Aug 23, 2014 @ 10:32 AM</div>
                                                        <ul class="comment-actions">
                                                                <li class="complain">Complain</li>
                                                                <li class="reply">Reply</li>
                                                        </ul>
                                                </div>
                                        </div>
                                </div>
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
                </div>
            </div>
@endsection