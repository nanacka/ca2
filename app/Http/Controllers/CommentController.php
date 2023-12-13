<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Auth;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();

    }

    public function create()
    {
        $tags = Tag::all();
        return view('admin.posts.create')->with('tags', $tags);                        
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = Comment::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'post_id' => Post::id()
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 
        //get all the posts with the comment id
        //if the id matches the post
        $post = Post::findOrFail($id);
        
        if($comment->post_id = $id){
            return view('posts.show', [
                'coment' => $comment
            ]);
        }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('status', 'deleted post');
    }
}