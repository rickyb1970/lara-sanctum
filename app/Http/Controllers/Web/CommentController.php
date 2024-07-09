<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Comment added successfully.');
    }

    public function edit(Comment $comment)
    {
        Gate::authorize('update',$comment);

        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        Gate::authorize('update',$comment);

        $request->validate([
            'body' => 'sometimes|string',
        ]);

        $comment->update($request->only('body'));

        return redirect()->route('posts.show', $comment->post)->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        Gate::authorize('delete', $comment);

        $post = $comment->post;
        $comment->delete();

        return redirect()->route('posts.show', $post)->with('success', 'Comment deleted successfully.');
    }
}
