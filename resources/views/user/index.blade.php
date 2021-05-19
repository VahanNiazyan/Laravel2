@extends('layout.app')

@section('title-main')
    Index
@endsection

@section('content-main')
    <h1>Index</h1>

        @if(session('success'))
            <div class="alert-danger">
        <em>{{ session('success') }}</em>
            </div>
        @endif

        @foreach($users as $user)
            <div class="alert-success">
        <h3>{{ $user->fname }} {{ $user->lname }}</h3>
        <em>{{ $user->email }}</em>
                <a href="{{ route('delete', ['id' => $user->id]) }}">Delete</a>
            </div>
            <br>
        @endforeach

@endsection
