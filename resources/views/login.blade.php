@extends('layout.app')

@section('title-main')
Login
@endsection

@section('content-main')
<h1>Login</h1>

<div>
   
    <form class="col-4" action="{{route('main-login')}}" method="post">
    @if(Session::get('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" type="text" placeholder="Enter user email" class="form-control mb-4" value="{{old('email')}}">
            @error('email')
            <em class="alert alert-danger">{{$message}}</em>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Email</label>
            <input name="password" type="password" placeholder="Enter user password" class="form-control mb-4">
            @error('password')
            <em class="alert alert-danger">{{$message}}</em>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"> Login </button>
    </form>
</div>
@endsection