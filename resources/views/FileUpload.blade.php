@extends('layouts.app')


@section('scripts')
@endsection

@section('content')

    <div class="container">


        <div class="perfect-centering">
            <form  action="{{ url('file-upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" id="file">
                <button type="submit">Upload</button>
            </form>
        </div>



    </div>
@endsection


