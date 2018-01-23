@if(isset($errors) && count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach($errors as $error)
            <li><strong>{!! $error !!}</strong></li>
        @endforeach
    </div>
@endif