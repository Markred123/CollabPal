{{-- Welcome.blade.php--}}
{{--31/05/21--}}
{{--@AUTHOR Mark Redmond--}}
@extends('layouts.app')

@section('scripts')
@endsection


@section('content')

    <div class="container perfect-centering">
        <div class="row">
            <div class ="col-sm">
            </div>
            <div class ="col-sm card">
                <h2>User Account Information</h2>
                <h5>Name: {{ Auth::user()->name }}</h5>
                <h5>Email Address: {{ Auth::user()->email }}</h5>
                @if(Auth::User()->subscribed('Premium Collabpal'))
                    <h5>Subscribed</h5>
                @else
                    <h5>Not Subscribed</h5>
                @endif
                <form method="POST" action="/user/two-factor-authentication">
                    @csrf

                    @if(auth()->user()->two_factor_secret)
                        @method('DELETE')
                        <div class="pb-4">
                            {!! auth()->user()->twoFactorQrCodeSvg()!!}
                        </div>
                        <button class="btn btn-danger">Disable Two Factor Authentication</button>
                    @else
                        <button class="btn btn-primary">Enable Two Factor Authentication</button>

                    @endif

                </form>
            </div>
            <div class ="col-sm"></div>


        </div>
    </div>


@endsection
