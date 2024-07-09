@extends('mainLayout')

@section('title','Laravel Sanctum App')

@section('page-content')
    <div>
        @include('../slug/logout-slug')
        <nav>
            <a href="{{ route('home') }}">Home</a>
        </nav>
        <hr>
    </div>
    <div>
        @yield('content')
    </div>
@endsection
