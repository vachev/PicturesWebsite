@extends('master')

@section('content')
    <h1>Users</h1>
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
                <td>
                    {!! Form::open(['method' => 'delete', 'url' => ['admin/users/delete', $user->id]]) !!}
                    {!! Form::button('Delete user', ['class' => 'btn btn-danger', 'name' => 'action', 'type' =>
                    'submit']) !!}
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['method' => 'post', 'url' => ['admin/users/show', $user->id]]) !!}
                    {!! Form::button('Show pictures', ['class' => 'btn btn-primary', 'name' => 'action', 'type' =>
                    'submit']) !!}
                    {!! Form::close() !!}
                </td>
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
    <nav class="navbar navbar-inverse">
        <div class="container">
            <a class="navbar-brand" href="admin">Pictures website | Administration</a>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/public/admin">Home</a></li>
                    <li><a href="pictures">Pictures</a></li>
                    <li><a href="users">Users</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <a href="/public/home" type="button" class="btn btn-danger navbar-btn">Back to the site</a>
                    <li><a href="/public/auth/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
@stop