@extends('master')
@section('content')
    <h1 class="text-center">Show picture
        <small>{{$image->filename}}</small>
        @if (!$currUser)
            @elseif($currUser->id == $image->uploader || $currUser->email == "admin@admin.com")
            {!! Form::open(['method' => 'delete', 'url' => ['pictures/delete', $image->id]]) !!}
            {!! Form::button('Delete photo', ['class' => 'btn btn-danger', 'name' => 'action', 'type' => 'submit']) !!}
            {!! Form::close() !!}
        @endif</h1>
    <hr/>
    <div class="row">
        <img class="center-block img-thumbnail" style='max-width: 800px;'
             src="/TestApp/public/images/pictures/{{ $image->filename }}" alt="{{ $image->uploader }}">
    </div>
    <hr/>
    <h3 class="text-center">Comments</h3>
    <hr/>
    @if ($comments->first())
        @foreach ($comments as $comment)
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h4>{{$comment->author}}
                        <small> {{$comment->created_at}}</small>
                    </h4>
                    <p>{{$comment->content}}</p>
                </div>
                @if ($currUser)
                    @if ($comment->author == $currUser->name || $currUser->email == "admin@admin.com")
                        <div class="panel-footer text-right">
                            {!! Form::open(['method' => 'delete', 'url' => ['comments/delete', $comment->id,
                            $image->id]]) !!}
                            {!! Form::button('Delete', ['class' => 'btn btn-danger', 'name' => 'action', 'type' =>
                            'submit']) !!}
                            {!! Form::close() !!}
                        </div>
                    @endif
                @endif
            </div>
        @endforeach
        <nav>
            <ul class="pager">
                <li>{!! $comments->render() !!}</li>
            </ul>
        </nav>
    @else
        <h1 class="text-center text-primary">There are no comments yet. Be the first one!</h1>
    @endif
    @if($currUser)

        <hr/>
        <h3 class="text-center">Add comment</h3>
        <hr/>

        {!! Form::open(['class' => 'form-horizontal']) !!}
        <div class="form-group">
            <label for="message" class="col-sm-2 control-label">Message</label>

            <div class="col-sm-10">
                {!! Form::text('message', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {!! Form::button('Publish', ['class' => 'btn btn-primary', 'name' => 'action', 'type' => 'submit']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    @endif
@stop

@section('nav')
    <nav class="navbar navbar-default">
        <div class="container">
            <a class="navbar-brand" href="/TestApp/public/home">Pictures website</a>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/TestApp/public/home">Home</a></li>
                    <li class="active"><a href="/TestApp/public/pictures">Pictures <span
                                    class="sr-only">(current)</span></a></li>
                    <li><a href="/public/users">Users</a></li>
                    <li><a href="/public/contacts">Contacts</a></li>
                </ul>
                @if($currUser)
                    <ul class="nav navbar-nav navbar-right">
                        <a href="/public/upload" type="button" class="btn btn-primary navbar-btn">Upload
                            photo</a>
                        <li><a href="/public/edit">Edit profile</a></li>
                        <li><a href="/public/auth/logout">Logout</a></li>
                        @if($currUser->email == "admin@admin.com")
                            <a href="/public/admin" type="button" class="btn btn-danger navbar-btn">Administration</a>
                        @endif
                    </ul>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <a href="/public/auth/login" type="button" class="btn btn-primary navbar-btn">Login</a>
                        <a href="/public/auth/register" type="button" class="btn btn-default navbar-btn">Register</a>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
@stop