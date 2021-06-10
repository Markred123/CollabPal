@extends('layouts.app')


@section('scripts')
@endsection

@section('content')

    <div class="container">

        <div class="card border-0 shadow my-5">
            <div style="height: 100vh">
                <h1 class="font-weight-light">My Files:</h1>
                @foreach($userFile as $tes)
                    <a href="{{url('/fileDownload',$tes->id)}}"> {{$tes->FileName}} </a>
                    <br>
                    <button type ="button" class="btn-success">Download</button>
                    <button class="btn-danger">Delete</button>
                    <br>
                @endforeach

            </div>
        </div>


    </div>
@endsection
