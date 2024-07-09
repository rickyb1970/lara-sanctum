@extends('mainLayout')

@section('page-title','Main Landing Page')

@section('page-content')
    @include('slug.logout-slug')
    <h1>Welcome to the Site</h1>
    <a href="{{ route('posts.index') }}">Go to User Posts</a>
@endsection
