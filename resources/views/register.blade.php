@extends('layout.app')

@section('title-main')
Register
@endsection

@section('content-main')
<h1>Register pages</h1>
        @if(session('success'))
        <div class="alert alert-success">
        {{session('success')}}
        </div>
        @endif
<div>
    <form class="col-4" action="{{ route('main-register') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="fname">first name</label>
            <input name="fname" type="text" placeholder="Enter first name" class="form-control mb-3" value="{{ old('fname')}}">
            @error('fname')
            <em class="alert alert-danger">{{$message}}</em>
            @enderror
        </div>

        <div class="form-group">
            <label for="lname">last name</label>
            <input name="lname" type="text" placeholder="Enter last name" class="form-control mb-3" value="{{ old('lname')}}">
            @error('lname')
            <em class="alert alert-danger">{{$message}}</em>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" type="text" placeholder="Enter user email" class="form-control mb-3" value="{{ old('email')}}">
            @error('email')
            <em class="alert alert-danger">{{$message}}</em>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" placeholder="Enter user password" class="form-control mb-3">
            @error('password')
            <em class="alert alert-danger">{{$message}}</em>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"> Send </button>
    </form>
</div>
@endsection