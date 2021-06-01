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
                <div class = "container  col-lg-12">

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="code" placeholder="Code"><br>
                        </div>
                    </div>
                </div>
                <input name="submit" type="submit" value="Submit" class="btn btn-info btn-block">

            </form>
        </div>





    </div>

@endsection
