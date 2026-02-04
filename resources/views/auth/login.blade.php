@extends('layout')

@section('title','Log in')

@section('content')
    @include('components.messages')
    <h2>Log in</h2>

    <form method="POST" action="/login">
        @csrf
        <div class="form">
            <div class="form-group">
                <label>Email address：</label>
                <input type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label>Password：</label>
                <input type="password" name="password">
            </div>

            <div class="button-area">
                <button type="submit">Log in</button>
            </div>
        </div>
    </form>
@endsection