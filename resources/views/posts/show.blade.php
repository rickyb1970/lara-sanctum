@extends('layouts.app')

@section('content')
    <h3>User {{ $post->user->name }} wrote...</h3>
    <h1 style="font-size: 1.8rem;">{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <hr>
    <h2>Comments</h2>
    @foreach ($post->comments as $comment)
        <div>
            <p>{{ $comment->body }}<span>{{ ' ['.$comment->user->name.']' }}</span>
                <a href="{{ route('comments.edit', $comment) }}">Edit</a>
                <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </p>
        </div>
    @endforeach
    <hr>
    <form action="{{ route('comments.store', $post) }}" method="POST">
        @csrf
        <div>
            <label for="body">New Comment</label>
            <textarea name="body" id="body" required></textarea>
        </div>
        <button type="submit">Add Comment</button>
    </form>
    <hr>
    <a href="{{ route('posts.edit', $post) }}">Edit Post</a>
    <form action="{{ route('posts.destroy', $post) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Post</button>
    </form>
    <div>
        <a href="{{ route('posts.index') }}">Back</a>
    </div>
@endsection
