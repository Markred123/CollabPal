@extends('layouts.app')


@section('scripts')
@endsection

@section('content')

    <div class="container">

        <div class="card border-0 shadow my-5">
            <div style="height: 100vh ">
                <h1 class="font-weight-light">My Folders:</h1>
                @foreach($userFolder as $folder)
                    <div class="container">
                        <a href="{{url('/myFiles',$folder->id)}}">{{$folder->FolderName}} </a>
                        <br>
                        <a onclick="return confirm('Are you sure?')" href="{{url('/folderDelete',$folder->id)}}"><button class="btn-danger">Delete</button></a>
                        <br>
                    </div>
                @endforeach
                <div class="container">
                    <form method="post" action="/newFolder">
                        @csrf
                        <label>Create Folder</label>
                        <input type="text" id="folderName" name="folderName" required>
                        <input type="submit" value="Create">
                    </form>
                </div>


            </div>
        </div>


    </div>

    <div class="container">


        <div class="perfect-centering">
            @if(Auth::User()->subscribed('Premium Collabpal'))
                <form  action="{{ url('FileUpload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" id="file" required="required">
                    <button type="submit">Upload</button>

                    <br>
                    <label>Folder:</label>
                    <select id="folders" name="folders" required>
                        @foreach($userFolder as $folder)
                            <option value="{{$folder->id}}">{{$folder->FolderName}}</option>
                        @endforeach
                    </select>
                </form>


            @else
                <p>Please subscribe to use premium features</p>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        </div>
    </div>

@endsection
