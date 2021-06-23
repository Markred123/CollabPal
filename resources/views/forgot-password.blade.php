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
            <form class="card p-3 bg-light " method="POST" action="{{url('/forgot-password') }}">
                @csrf
                <input type="email" name="email" placeholder="Email"><br>
                <input name="submit" type="submit" value="Reset Password" class="btn btn-info btn-block">
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
            </form>

        </div>





    </div>
@endsection
