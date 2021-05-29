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
    <div class="col-md-4 col-md-offset-4">

                <div class ="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-body">
                            <form method="post" action="/register">
                                @csrf

                                <div class="col-xs-6 col-sm-6 col-md-6">

                                    <div class="form-group">
                                        <input required type ="text" id="name" name="name" class="form-control input-sm" placeholder="Name"><br>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input required type ="email" id="email" name="email" class="form-control input-sm" placeholder="Email"><br>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">

                                        <input required type ="password" id="password" name="password" class="form-control input-sm" placeholder="Password"><br>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input required type ="password" class="form-control input-sm" id="password_confirmation" name="password_confirmation"  placeholder="Confirmation"><br>
                                    </div>
                                </div>
                                <input type="submit" value="Register" class="btn btn-info btn-block">

                            </form>

                        </div>
                    </div>

            </div>




    </div>

</body>
</html>
