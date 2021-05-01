@extends('layout.app')

@section('title-main')
Login
@endsection

@section('content-main')
<h1>Login</h1>

<div>
    <form class="col-4" action="" method="post">
    @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" type="text" placeholder="Enter user email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Email</label>
            <input name="password" type="password" placeholder="Enter user password" class="form-control">
        </div>
        <button type="submit" class="btn btn-success"> Login </button>
    </form>
</div>
@endsection