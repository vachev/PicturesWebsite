@extends('master')

@section('content')
    <div class="row">
        <h1 class="flow-text pink-text">All pictures</h1>
        <hr/>
        <div class="row">
            @foreach ($images as $image)
                <div class="col-xs-6 col-md-3">
                    <a href="show/{{$image->id}}" class="thumbnail">
                        <img width="200px" src="images/pictures/{{ $image->filename }}" alt="{{ $image->uploader }}">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row">
            <hr/>
            <nav>
                <ul class="pager">
                    <li>{!! $images->render() !!}</li>
                </ul>
            </nav>
        </div>
        @stop

        @section('nav')
            <nav class="navbar navbar-default">
                <div class="container">
                    <a class="navbar-brand" href="home">Pictures website</a>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="home">Home</a></li>
                            <li class="active"><a href="pictures">Pictures <span class="sr-only">(current)</span></a>
                            </li>
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