@extends('layout.app')

@section('title-main')
    Show
@endsection

@section('content-main')
    <h1>Show</h1>
    @foreach($users as $user)
    <div class="alert-success">
    <tr>
        <td>{{ $user->fname }}</td>
        <td>{{ $user->lname }}</td>
        <td>{{ $user->email }}</td>
    </tr>
    </div>
    @endforeach
@endsection
