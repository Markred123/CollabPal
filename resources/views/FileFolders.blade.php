@extends('layouts.app')


@section('scripts')
@endsection

@section('content')

    <div class="container">

        <div class="card border-0 shadow my-5">
            <div style="height: 100vh ">
                <h1 class="font-weight-light">My Folders:</h1>
                <div class="container">
                    <form method="post" action="/newFolder">
                        @csrf
                        <label>Create Folder</label>
                        <input type="text" id="folderName" name="folderName">
                        <input type="submit" value="Create">
                    </form>
                </div>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @foreach($userFolder as $folder)
                    <div class="container">
                        <a href="{{url('/myFiles',$folder->id)}}">{{$folder->FolderName}} </a>
                        <br>
                        <a onclick="return confirm('Are you sure?')" href="{{url('/folderDelete',$folder->id)}}"><button class="btn-danger">Delete</button></a>
                        <br>
                    </div>
                @endforeach


            </div>
        </div>


    </div>

@endsection
