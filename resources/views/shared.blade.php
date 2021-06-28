{{--15/05/2021--}}
{{--@author Mark Redmond x16355811--}}
@extends('layouts.app')


@section('scripts')
@endsection

@section('content')

    <div class="container">

        <div class="card border-0 shadow my-5">
            <div style="height: 100vh ">
                <h1 class="font-weight-light">Files Shared With Me:</h1>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @foreach($userFile as $tes)
                    <div class="container">
                        <h6> {{$tes->originalFileName}} </h6>
                        <a  href="{{url('/sharedDownload',$tes->id)}}"><button type ="button" class="btn-success">Download</button></a>
                        <a onclick="return confirm('Are you sure?')" href="{{url('/sharedDelete',$tes->id)}}"><button class="btn-danger">Delete</button></a>
                        <br>
                    </div>
                @endforeach
            </div>
        </div>


    </div>

@endsection
