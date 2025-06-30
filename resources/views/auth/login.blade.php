@extends('mainLayout')

@section('page-title','Account Login')

@section('auth-content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label class="auth-labels">Username</label>
            <input type="text" name="name" value="{{ old('username') }}" class="auth-textbox">
            @error('name')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="auth-labels">Password</label>
            <input type="password" name="password" class="auth-textbox">
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Login</button>
    </form>
    <div>
        Not yet registered? Click <a href="{{ route('register') }}">Here</a>
    </div>
@endsection
