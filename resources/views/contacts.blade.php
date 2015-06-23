@extends('master')

@section('content')
    <h1>Contact us</h1>
    <hr/>
    {!! Form::open(['url' => 'contacts/send', 'class' => 'form-horizontal', 'method' => 'POST']) !!}
    <fieldset>
        <div class="form-group">
            <label class="col-md-4 control-label" for="fullname">Full Name</label>

            <div class="col-md-6">
                {!! Form::text('name', null, ['class' => 'form-control input-md', 'id' => 'fullname']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="email">Email</label>

            <div class="col-md-6">
                {!! Form::text('email', null, ['class' => 'form-control input-md', 'id' => 'email']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="message">Message</label>

            <div class="col-md-4">
                {!! Form::textarea('message', null, ['class' => 'form-control', 'id' => 'message']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="send"></label>

            <div class="col-md-4">
                {!! Form::button('Send', ['class' => 'btn btn-primary','id' => 'send' ,'name' => 'action', 'type' =>
                'submit']) !!}
            </div>
        </div>
    </fieldset>
    {!! Form::close() !!}
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
                    <li class="active"><a href="contacts">Contacts <span class="sr-only">(current)</span></a></li>
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