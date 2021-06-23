<!doctype html>
<html lang="en">
<head>
    <style>
    .perfect-centering{
    position: absolute;
    top: 50%;
    left:50%;
    transform: translate(-50%,-50%);
    }
    body {
        background: url('https://i2.wp.com/ese224.seas.upenn.edu/wp-content/uploads/2018/11/background-website-light-blue-wallpapers-background-2.jpg?ssl=1') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
        padding-top: 50px;
        color: black;

    }
    .padding {
        padding-top: 50px;

    }

    </style>
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

    <nav class="navbar navbar-expand-sm fixed-top bg-light">

        <a class="navbar-brand" href="#">CollabPal</a>
        <div class="collapse navbar-collapse">
            <a class="nav-link" href="/welcome">Home</a>
            @if (!Auth::guest())
                <a class="nav-link" href="/fileFolder">My Files</a>
                <a class="nav-link" href="/sharedFiles">Shared Files</a>

            @endif
                <div class="navbar-nav ml-auto">

                    @if (!Auth::guest())

                        <a class ="nav-link">{{ Auth::user()->name }} </a>
                        <a class ="nav-link" href="/userInfo">Account</a>
                        <a class ="nav-link" href="/subscription">Subscription</a>
                        <a class="nav-link" href="/destroy">Log Out</a>

                    @else
                        <a class="nav-link" href="/register">Registration</a>
                        <a class="nav-link" href="/login">Login</a>
                    @endif
                </div>
        </div>


    </nav>



</div>


@yield('content')




</body>
</html>
