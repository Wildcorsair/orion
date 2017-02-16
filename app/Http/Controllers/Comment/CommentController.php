<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Session;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }

    /**
     * Save new comment into the database and link it to post
     *
     * @param Request $request
     * @param integer $post_id Post identifier
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Display form for comment editing
     *
     * @param $id Comment identifier
     * @return mixed
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit')->withComment($comment);
    }

    /**
     * Update comment in the database
     *
     * @param Request $request
     * @param integer $id Comment identifier
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'comment' => 'required|max:2000'
        ]);

        $comment = Comment::find($id);
        $comment->comment = $request->comment;
        $comment->save();

        Session::flash('success', 'The comment was successfully updated!');

        return redirect()->route('posts.show', $comment->post->id);
    }

    /**
     * Display form for comment deleting
     *
     * @param integer $id Comment identifier
     * @return mixed
     */
    public function delete($id)
    {
        $comment = Comment::find($id);

        return view('comments.delete')->withComment($comment);
    }


    /**
     * Delete comment from database
     *
     * @param integer $id Comment identifier
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        $post_id = $comment->post->id;

        $comment->delete();

        Session::flash('success', 'The comment was successfully deleted!');

        return redirect()->route('posts.show', $post_id);
    }
}
