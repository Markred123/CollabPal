<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Collab Pal</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('scripts')
</head>
<body>
<div>

    <nav class="navbar navbar-expand-sm bg-light">

        <a class="navbar-brand" href="#">CollabPal</a>
        <div class="collapse navbar-collapse">
            <a class="nav-link" href="/welcome">Home</a>
                <div class="navbar-nav ml-auto">

                    @if (!Auth::guest())

                        <a class ="nav-link" href="/userInfo">{{ Auth::user()->name }} </a>
                        <a class="nav-link" href="/destroy">Log Out</a>

                    @else
                        <a class="nav-link" href="/registration">Registration</a>
                        <a class="nav-link" href="/login">Login</a>
                    @endif
                </div>
        </div>


    </nav>



</div>
@yield('content')



</body>
</html>
