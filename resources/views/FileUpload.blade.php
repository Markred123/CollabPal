@extends('layouts.app')


@section('scripts')

@endsection

@section('content')

    <div class="container">


        <div class="perfect-centering">
            <form  action="{{ url('FileUpload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" id="file" required="required" multiple>
                <button type="submit">Upload</button>
            </form>

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


