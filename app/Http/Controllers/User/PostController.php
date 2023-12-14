<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Comment;

use Auth;


class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(10);
        return view('user.posts.index')->with('posts', $posts);
    }

    public function show(string $id)
    {
        // $posts = Post::findOrFail($id);
        // return view('user.posts.show')->with('posts', $posts);
        
        $post = Post::findOrFail($id);

        //need to get all of the comments where the post id matches the id here
        //get all comments where id = id up there


        // $comments = Post::find($id);
        // $comments = Comment::findOrFail($comments->post_id);

        // $comments = Comment::select('')

        // $comments = DB::table('comments')->where('post_id', $id)->get('content', 'user_id');

        // $commenters = DB::table('comments')->leftJoin('users', 'comments.user_id', '=', 'users.name')->where('comments.post_id', $id)->get('user_id as users.name');

        // $comments = DB::table('comments.content')->select('content')->where('comments.post_id', $id);

        // $post

        // 'user_id as id'

        // $commenters = DB::table('comments.user_id')->where()

        //getting username. got to get the user first name. foreign id on the posts is user id. hmmm

        // if($comments){
        //     return view('user.posts.show', [
        //         'post' => $post
        //     ]);
        // }
        

        return view('user.posts.show', [
            'post' => $post
        ]);
        
    }

}