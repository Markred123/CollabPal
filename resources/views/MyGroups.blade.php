{{--15/05/2021--}}
{{--@author Mark Redmond x16355811--}}
@extends('layouts.app')


@section('scripts')
@endsection

@section('content')

    <div class="container">

        <div class="card border-0 shadow my-5">
            <div style="height: 100vh ">
                @if(Auth::User()->subscribed('Premium Collabpal'))

                    <h1 class="font-weight-light">My Folders:</h1>

                    @foreach($user->groups as $group)
                        <div class="container">
                            <a href="{{url('/myFiles',$group->id)}}">{{$group->name}} </a>
{{--                            <br>--}}
{{--                            <a onclick="return confirm('Are you sure?')" href="{{url('/folderDelete',$folder->id)}}"><button class="btn-danger">Delete</button></a>--}}
{{--                            <br>--}}
                        </div>
                    @endforeach
                    <div class="container">
                        <form method="post" action="/groupCreate">
                            @csrf
                            <label>Create a group</label>
                            <input type="text" id="name" name="name" required>
                            <input type="submit" value="Create">
                        </form>
                    </div>


            </div>
        </div>


    </div>
    @endif

    <div class="container">


        <div class="perfect-centering">
            @if(Auth::User()->subscribed('Premium Collabpal'))
                <form class="card p-3 bg-light"  action="{{ url('FileUpload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" id="file" required="required">

                    <br>
                    <label>Choose a folder:</label>
                    <select id="folders" name="folders" required>
                        @foreach($user->groups as $group)
                            <option value="{{$group->id}}">{{$group->name}}</option>
                        @endforeach
                    </select>
                    <br>
                    <button type="submit">Upload</button>

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
