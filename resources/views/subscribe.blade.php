@extends('layouts.app')



@section('scripts')
@endsection

@section('content')


    <div class="col-md-offset-3 container perfect-centering">

        <div class ="container col-lg-6">
            <form class="card p-3 bg-light " method="post" action="/user/subscribe">
                @csrf
                <div class = "container  col-lg-12">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <input required type ="test" id="email" name="email" class="form-control input-sm" placeholder="Email"><br>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">

                            <input required type ="test" id="password" name="password" class="form-control @error('password') is-invalid @enderror input-sm" placeholder="Password"><br>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <input type="submit" value="Login" class="btn btn-info btn-block">

            </form>
        </div>





    </div>
@endsection
