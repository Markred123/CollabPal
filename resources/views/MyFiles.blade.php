@extends('layouts.app')


@section('scripts')
@endsection

@section('content')

    <div class="container">

        <div class="card border-0 shadow my-5">
            <div style="height: 100vh">
                <h1 class="font-weight-light">My Files:</h1>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @foreach($userFile as $tes)
                    <h6> {{$tes->originalFileName}} </h6>
                    <a href="{{url('/fileDownload',$tes->id)}}"><button type ="button" class="btn-success">Download</button></a>
                    <a href="{{url('/fileDelete',$tes->id)}}"><button class="btn-danger">Delete</button></a>
                    <br>
                @endforeach

            </div>
        </div>


    </div>
@endsection
