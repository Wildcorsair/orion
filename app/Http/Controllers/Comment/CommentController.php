<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Session;

class CommentController extends Controller
{
    public function store(Request $request, $post_id)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        $post = Post::find($post_id);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('success', 'Comment was successfully added!');

        return redirect()->route('blog.single', [$post->slug]);
    }
}
