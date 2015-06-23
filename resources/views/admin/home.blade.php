@extends('master')

@section('content')
    <h1>Welcome, {{$currUser->name}}!</h1>
    <hr/>
    <h3 class="text-primary">Last 5 registrations</h3>
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
    <hr/>
    <h3 class="text-primary">Last 5 pictures</h3>
    <div class="row text-center">
        @foreach ($images as $image)
            <div class="col-lg-2">
                <a href="show/{{$image->id}}"><img width="150px" src="images/pictures/{{$image->filename}}"
                                                   class="img-thumbnail"></a>

                <p class="badge">Uploader id: {{$image->uploader}}</p>
            </div>

        @endforeach
    </div>
@stop

@section('nav')
    <nav class="navbar navbar-inverse">
        <div class="container">
            <a class="navbar-brand" href="admin">Pictures website | Administration</a>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="admin">Home</a></li>
                    <li><a href="admin/pictures">Pictures</a></li>
                    <li><a href="admin/users">Users</a></li>
                </ul>
                @if($currUser)
                    <ul class="nav navbar-nav navbar-right">
                        <a href="/public/home" type="button" class="btn btn-danger navbar-btn">Back to the
                            site</a>
                        <li><a href="/public/auth/logout">Logout</a></li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
@stop