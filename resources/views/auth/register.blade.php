@extends('layout')

@section('title','Sign up')

@section('content')
    @include('components.messages')
    <h2>Sign up</h2>
    <p class="signup-read">Create your account to get started.</p>
    
    <form method="POST" action="/register">
        @csrf
        <div class="form">
            <div class="form-group">
                <label>User name：</label>
                <input type="text" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label>Email address：</label>
                <input type="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label>Password：</label>
                <input type="password" name="password" placeholder="At least 6 characters">
            </div>
            <div class="form-group">
                <label>Confirm Password：</label>
                <input type="password" name="password_confirmation" placeholder="Same as above">
            </div>
            <div class="button-area">
                <button type="submit">Sign up</button>
            </div>
        </div>
    </form>
@endsection