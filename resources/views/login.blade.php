{{-- Welcome.blade.php--}}
{{--25/05/21--}}
{{--@AUTHOR Mark Redmond--}}
@extends('layouts.app')

@section('scripts')
@endsection

@section('content')

    <div class="col-md-offset-3 container perfect-centering">

        <div class ="container col-lg-6 card p-3 bg-light">
            <form class="" method="post" action="login">
                @csrf
                <div class = "container  col-lg-12">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <input required type ="email" id="email" name="email" class="form-control input-sm" placeholder="Email"><br>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">

                            <input required type ="password" id="password" name="password" class="form-control input-sm" placeholder="Password"><br>
                        </div>
                    </div>
                </div>
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
                <input type="submit" value="Login" class="btn btn-info btn-block">

            </form>
           <a href="/forgot-password"> <button class="btn btninfo btn-block">Forgot Password</button></a>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
         @endif
        </div>





    </div>
@endsection
