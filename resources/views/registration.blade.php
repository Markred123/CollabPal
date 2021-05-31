{{-- Welcome.blade.php--}}
{{--25/05/21--}}
{{--@AUTHOR Mark Redmond--}}
@extends('layouts.app')

@section('scripts')

@endsection


@section('content')
    <div class="col-md-3 col-md-offset-4 container ">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div class ="container col-md-12">
            <form class="card p-3 bg-light " method="post" action="/register">
                @csrf
                <div class = "container  col-lg-12">
                    <div class="col-xs-6 col-sm-6 col-md-6 align-content-center">

                        <div class="form-group">
                            <input required type ="text" id="name" name="name" class="form-control input-sm" placeholder="Name"><br>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <input required type ="email" id="email" name="email" class="form-control input-sm" placeholder="Email"><br>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">

                            <input required type ="password" id="password" name="password" class="form-control input-sm" placeholder="Password"><br>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 ">
                        <div class="form-group">
                            <input required type ="password" class="form-control input-sm" id="password_confirmation" name="password_confirmation"  placeholder="Confirmation"><br>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Register" class="btn btn-info btn-block">

            </form>
        </div>





    </div>
@endsection
