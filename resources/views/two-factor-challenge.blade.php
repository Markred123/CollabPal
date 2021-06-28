{{--15/05/2021--}}
{{--@author Mark Redmond x16355811--}}
@extends('layouts.app')


@section('scripts')


@endsection

@section('content')
    {{-- Welcome.blade.php--}}
    {{--25/05/21--}}
    {{--@AUTHOR Mark Redmond--}}
    @extends('layouts.app')

@section('scripts')

@endsection


@section('content')
    <div class="col-md-offset-3 container perfect-centering">

        <div class ="container col-lg-6">

            <form class="card p-3 bg-light " method="post" action="/two-factor-challenge">
                @csrf
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input required type ="text" id="code" name="code" class="form-control input-sm" placeholder="Code"><br>
                </div>

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <input type="submit" value="Submit" class="btn btn-info btn-block">

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


@endsection
