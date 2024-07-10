@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}">Create New Post</a>
    <hr>
    @foreach ($posts as $post)
        <div>
            <h2><span style="color: blue;">{{ '['.$post->user->name.']' }}</span><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2>
            <p>
               {{ $post->body }}
               <a href="{{ route('posts.edit', $post) }}">Edit</a>
            </p>
            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete Post</button>
            </form>
        </div>
        <hr>
    @endforeach
@endsection
