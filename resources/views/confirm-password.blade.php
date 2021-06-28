{{--15/05/2021--}}
{{--@author Mark Redmond x16355811--}}
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

        <div class ="container col-md-12 card p-3 bg-light ">
            <form method="POST" action="{{url('/user/confirm-password') }}">
                @csrf
                <div class="form-group">
                    <label>Please confirm your password</label>
                    <input required type ="password" id="password" name="password" class="form-control input-sm" placeholder="Password"><br>
                </div>
                <input name="submit" type="submit" value="Submit" class="btn btn-info btn-block">

            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                </div>
            @endif

        </div>





    </div>

@endsection
