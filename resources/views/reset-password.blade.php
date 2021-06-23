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

        <div class ="container">
            <form class="card p-3 bg-light " method="POST" action="{{url('/reset-password') }}">
                @csrf
                <input type="string" name="email" class="form-control input-sm" value="{{$request->email}}"><br>
                <input type ="hidden" name="token" value="{{$request->route('token')}}">
                <input type ="password" name="password" class="form-control input-sm"><br>
                <input type ="password" class="form-control input-sm" name="password_confirmation"><br>
                <input name="submit" type="submit" value="Reset Password" class="btn btn-info btn-block">

            </form>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif


    </div>
@endsection
