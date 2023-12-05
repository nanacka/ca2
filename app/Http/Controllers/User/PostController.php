<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('user.posts.index')->with('posts', $posts);
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('user.posts.show')->with('posts', $posts);
    }
}
