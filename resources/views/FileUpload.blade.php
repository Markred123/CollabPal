@extends('layouts.app')


@section('scripts')

@endsection

@section('content')

    <div class="container">


        <div class="perfect-centering">
            @if(Auth::User()->subscribed('Premium Collabpal'))
            <form  action="{{ url('FileUpload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" id="file" required="required">
                <select id="folders" name="folders">
                    @foreach($userFolder as $folder)

                        <option value="{{$folder->id}}">{{$folder->FolderName}}</option>
                    @endforeach
                </select>
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


