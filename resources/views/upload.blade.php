@extends('master')

@section('content')
    <h1>Upload picture</h1>
    @if ($currUser->photosUploaded < 10)
        <p>You have uploaded {{ $currUser->photosUploaded }} picture/s! Your limit is 10.</p>
        <hr/>

        {!! Form::open(['url' => 'upload', 'files' => true]) !!}
        {!! Form::file('image') !!}
        <hr/>
        {!! Form::button('Upload the picture', ['class' => 'btn btn-primary center-block', 'name' => 'action', 'type' => 'submit']) !!}
        {!! Form::close() !!}
    @else
        <h4>You have reached your limit of pictures, if you want to upload more delete some.</h4>
    @endif
@stop

@section('nav')
    <nav class="navbar navbar-default">
        <div class="container">
            <a class="navbar-brand" href="home">Pictures website</a>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="home">Home</a></li>
                    <li><a href="pictures">Pictures</a></li>
                    <li><a href="users">Users</a></li>
                    <li><a href="contacts">Contacts</a></li>
                </ul>
                @if($currUser)
                    <ul class="nav navbar-nav navbar-right">
                        <a href="upload" type="button" class="btn btn-primary navbar-btn">Upload photo</a>
                        <li><a href="edit">Edit profile</a></li>
                        <li><a href="auth/logout">Logout</a></li>
                        @if($currUser->email == "admin@admin.com")
                            <a href="admin" type="button" class="btn btn-danger navbar-btn">Administration</a>
                        @endif
                    </ul>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <a href="auth/login" type="button" class="btn btn-primary navbar-btn">Login</a>
                        <a href="auth/register" type="button" class="btn btn-default navbar-btn">Register</a>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
@stop