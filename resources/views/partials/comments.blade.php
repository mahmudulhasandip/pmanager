@foreach($comments as $comment)
    <div class="comment-wrap">
            <div class="photo">
                    {{--  <div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg')"></div>  --}}
                    <div class="avatar" style="margin-left: -10px;" ><i class='pe-7s-user pe-3x'></i></div>
            </div>
            <div class="comment-block">
                    <span class='font-bold'>{{$comment->user->name}}</span>
                    <div class="comment-email">{{$comment->user->email}}</div>
                    <p class="comment-text">{{$comment->body}}</p>
                    <a href='{{$comment->url}}' target='blank' class="comment-text" style='color: #3097d1;'>{{$comment->url}}</a>
                    <div class="bottom-comment">
                            <div class="comment-date">{{$comment->created_at}}</div>
                            <ul class="comment-actions">
                                    <li class="complain">Complain</li>
                                    <li class="reply">Reply</li>
                            </ul>
                    </div>
            </div>
    </div>
@endforeach