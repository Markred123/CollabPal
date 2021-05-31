{{-- Welcome.blade.php--}}
{{--31/05/21--}}
{{--@AUTHOR Mark Redmond--}}
@extends('layouts.app')

@section('scripts')
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class ="col-sm">
            </div>
            <div class ="col-sm card">
                <h2>User Account Information</h2>
                <h5>Name: {{ Auth::user()->name }}</h5>
                <h5>Email Address: {{ Auth::user()->email }}</h5>
                <h5>2FA Enabled: <input type="checkbox"></h5>
                <h5>Premium Account:</h5>

            </div>
            <div class ="col-sm"></div>


        </div>
    </div>


@endsection
