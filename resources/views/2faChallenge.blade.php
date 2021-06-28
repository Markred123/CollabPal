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

        <div class ="container col-md-12">
            <form class="card p-3 bg-light " method="POST" action="{{url('/two-factor-challenge') }}">
                @csrf
                <div class="form-group">
                    <input required type ="2faCode" id="2faCode" name="2faCode" class="form-control input-sm" placeholder="Code"><br>
                </div>
                <input name="submit" type="submit" value="Submit" class="btn btn-info btn-block">

            </form>
        </div>





    </div>

@endsection
