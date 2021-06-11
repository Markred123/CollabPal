{{-- Welcome.blade.php--}}
{{--25/05/21--}}
{{--@AUTHOR Mark Redmond--}}
@extends('layouts.app')

@section('scripts')

@endsection


@section('content')
    <div class="col-md-offset-3 container perfect-centering">

        <div class ="container col-lg-6">

            <form class="card p-3 bg-light " method="post" action="/register">
                @csrf
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label>Sign In</label>

                            <input required type ="text" id="name" name="name" class="form-control input-sm" placeholder="Name" value="{{ old('name') }}"><br>
                        </div>


                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input required type ="email" id="email" name="email" class="form-control input-sm" placeholder="Email" value="{{ old('email') }}"><br>
                        </div>


                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <input required type ="password" id="password" name="password" class="form-control input-sm" placeholder="Password"><br>
                        </div>

                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input required type ="password" class="form-control input-sm" id="password_confirmation" name="password_confirmation"  placeholder="Confirmation"><br>
                        </div>
                    @if (session('error'))
                     <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                <input type="submit" value="Register" class="btn btn-info btn-block">

            </form>
        </div>





    </div>
@endsection
