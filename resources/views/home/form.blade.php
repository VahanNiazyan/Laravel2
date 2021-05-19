@extends('layout.app')

@section('title-main')
Images
@endsection

@section('content-main')
<div>
    <form class="col-4" action="{{route('main-file')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="fname">first name</label>
            <input name="fname" type="text" placeholder="Enter first name" class="form-control mb-3" value="{{ old('fname')}}">
        </div>
       @if(session('success'))
       <em>session('success')</em>
       @endif
        <div class="form-group">
            <label for="file">File</label>
            <input name="file" type="file" class="form-control mb-3" >
        </div>

        <button type="submit" class="btn btn-success"> Send </button>
    </form>
</div>
@endsection