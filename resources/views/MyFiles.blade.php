{{--15/05/2021--}}
{{--@author Mark Redmond x16355811--}}
@extends('layouts.app')


@section('scripts')
    <script>
    $("#formButton").click(function(){
    $("#form1").toggle();
    });
    </script>
    <script>
        $(document).ready(function() {
            $("#formButton").click(function() {
                $("#form1").toggle();
            });
        });
    </script>
@endsection

@section('content')

    <div class="container">

        <div class="card border-0 shadow my-5">
            <div style="height: 100vh ">
                <h1 class="font-weight-light">My Files:</h1>
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
                        <a  href="{{url('/fileDownload',$tes->id)}}"><button type ="button" class="btn-success">Download</button></a>
                        <a onclick="return confirm('Are you sure you want to delete this?')" href="{{url('/fileDelete',$tes->id)}}"><button class="btn-danger">Delete</button></a>
                        <a href ="{{url('/fileShareByLink',$tes->id)}}" onclick="return confirm('Warning: Shared file can be accessed by anyone with the link. Do you wish to continue?')"><button type ="submit button" class="btn-info">Share by link</button></a>


                        <div>
                            <br>

                            <form method="post" action="/fileShare" id="form1">
                                @csrf
                                <input type="text" id="recipient" name="recipient" placeholder="Recipient Email" required>
                                <input type="hidden" id="id" name="id" value="{{$tes->id}}">

                                <a  href=""><button type ="submit button" class="btn-primary" >Share by email</button></a>
                            </form>


                        </div>
                        <br>
                    </div>
                @endforeach


            </div>
        </div>


    </div>

@endsection
