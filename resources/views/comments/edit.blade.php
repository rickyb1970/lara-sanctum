@extends('layouts.app')

@section('content')
    <h1>Edit Comment</h1>
    <form action="{{ route('comments.update', $comment) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="body">Body</label>
            <textarea name="body" id="body" required>{{ $comment->body }}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
