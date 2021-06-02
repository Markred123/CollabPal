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
                <a class="nav-link" href="/MyFiles">My Files</a>
                <a class="nav-link" href="/FileUpload">File Upload</a>
            @endif
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
<div
    style="
    background-image: url('https://images.pexels.com/photos/965121/pexels-photo-965121.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');
    height: 100vh; "
></div>
@yield('content')



</body>
</html>
