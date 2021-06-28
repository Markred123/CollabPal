{{--15/05/2021--}}
{{--@author Mark Redmond x16355811--}}
@extends('layouts.app')

@section('scripts')
@endsection


@section('content')
    <div class="container perfect-centering">
        <div class="row">
            <div class ="col-sm">
            </div>
            <div class ="col-sm card">
                <h5>Subscription Cost: €15/Month</h5>

                @if(Auth::User()->subscribed('Premium Collabpal'))
                @else
                    <p>Please go to the billing portal and add a payment method before subscribing</p>
                    <p>Test card: 4242 4242 4242 4242 480 06/25 35353</p>
                @endif
                <h5><a href="/billing-portal">Billing Portal</a></h5>
                @if(Auth::User()->subscribed('Premium Collabpal'))
                @else
                    <form method="POST" action="/user/subscribe">
                        @csrf
                        <input type="submit" value="Subscribe" class="btn">
                    </form>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif



            </div>
            <div class ="col-sm"></div>


        </div>
    </div>

@endsection
