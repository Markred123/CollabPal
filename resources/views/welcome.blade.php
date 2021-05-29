{{-- Welcome.blade.php--}}
{{--25/05/21--}}
{{--@AUTHOR Mark Redmond--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Collab Pal</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class = "relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0 float-right">

    <a href="/registration">Home</a>
    @if (!Auth::guest())
    <a href="#test">Log Out</a>
    @else
        <a href="#test">Registration</a>
        <a href="#test">Login</a>
    @endif



</div>








</body>
</html>
