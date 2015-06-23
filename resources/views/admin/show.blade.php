@extends('master')
@section('content')
    <div class="row">
        <h1 class="flow-text pink-text">Pictures
            <small><b>of the user</small>
        </h1>
        <hr/>
        <div class="row">
            @foreach ($images as $image)
                <div class="col-xs-6 col-md-3">
                    <a href="/TestApp/public/show/{{$image->id}}" class="thumbnail">
                        <img width="200px" src="/TestApp/public/images/pictures/{{ $image->filename }}"
                             alt="{{ $image->uploader }}">
                        <br/>
                        {!! Form::open(['class' => 'text-center','method' => 'delete', 'url' => ['pictures/delete',
                        $image->id]]) !!}
                        {!! Form::button('Delete photo', ['class' => 'btn btn-danger', 'name' => 'action', 'type' =>
                        'submit']) !!}
                        {!! Form::close() !!}
                    </a>
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
                            <li><a href="/public/admin">Home</a></li>
                            <li><a href="/public/admin/pictures">Pictures</a></li>
                            <li><a href="/public/admin/users">Users</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <a href="/public/home" type="button" class="btn btn-danger navbar-btn">Back to the
                                site</a>
                            <li><a href="/public/auth/logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
@stop