@extends('layouts.app')

@section('content')
<div class="glass-card">
    <div class="logo-section">
        <h1>Welcome</h1>
        <p>Login to your account to continue</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus placeholder="admin@3dhub.com">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required placeholder="••••••••">
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">
            <span>Sign In</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 256 256"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg>
        </button>
    </form>
</div>
@endsection
