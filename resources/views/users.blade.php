@extends('master')

@section('content')
    <h1>All users</h1>
    <hr/>

    <table class="table">
        <thead>
        <td>Id</td>
        <td>Name</td>
        <td>E-mail</td>
        <td>Uploaded pictures</td>
        <td>Registration date</td>
        </thead>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->photosUploaded}}</td>
                <td>{{$user->created_at}}</td>
            </tr>
        @endforeach
    </table>

    <div class="row">
        <hr/>
        <nav>
            <ul class="pager">
                {!! $users->render() !!}
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
                    <li><a href="pictures">Pictures</a></li>
                    <li class="active"><a href="users">Users <span class="sr-only">(current)</span></a></li>
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