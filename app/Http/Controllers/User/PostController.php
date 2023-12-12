<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
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

        return view('user.posts.show', [
            'post' => $post
        ]);
        
    }

    /**
    * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('user.posts.create') ->with('tags', $tags);
                                    
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

        $book_image = $request->file('book_image');
        $extension = $book_image->getClientOriginalExtension();
        
        //name the file to the date, the og filename, and the "extension" e.g. jpeg or png etc
        
        $filename = date('Y-m-d-His') . '_' . $request->title . '.' . $extension;
        // dd($book_image);
        
        //storing the image:
        
        $book_image->storeAs('public/images', $filename);

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'post_image' => $filename,
            'tag' => $request->tag,
            'user' => $request->user,
        ]);

        $post->tags()->attach($request->tags);

        return to_route('user.posts.index');
    }

    /**
     * Display the specified resource.

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