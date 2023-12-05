<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Auth;


class PostController extends Controller
{

    public function __construct()
    {
        //would've been nice if this worked... (apparently. I couldnt tell you why <3)
        //Auth::user()->authorizeRoles('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // if(!Auth::user()->hasRole('admin')){
        //     return to_route('user.posts.index');
        // }

        Auth::user()->authorizeRoles('admin');


        $posts = Post::all();

        return view('admin.posts.index', [
            'posts' => $posts 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.posts.create') ->with('tags', $tags);
                                    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:500',
            'tag_id' =>'required',
            'post_image' => 'file|image|dimensions:width=300,height=400',
            'post_image' => 'file|image',
            'user_id' => 'required',
            'tags' =>['required' , 'exists:tags,id']
        ]);

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'post_image' => $filename,
        //    'tag' => $request->tag,
        //    'user' => $user->tag,
        ]);

        $post->tags()->attach($request->tags);

        return to_route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.show', [
            'post' => $post
        ]);
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
        //
    }
}