<!DOCTYPE html>
<html>
<head>
    <title>Picture Website</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<header>
    @yield('nav')
    @include('flash::message')
</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>