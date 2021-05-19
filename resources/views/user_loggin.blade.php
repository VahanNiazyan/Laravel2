@extends('layout.app')

@section('title-main')
User Login
@endsection

@section('content-main')
<h1>User Login</h1>
<div class="alert alert-success">

<h4><em>{{ $LoggedUserinfo['fname'] }}</em></h4>
<p><em>{{ $LoggedUserinfo['lname'] }}</em></p>
<p><em>{{ $LoggedUserinfo['email'] }}</em></p>
</div>
@endsection