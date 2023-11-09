<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('date_created')->paginate(10);
        return view('posts.index', [
            'posts' =>$posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        //validation rules
    
        //    THIS ONE FOR UNIQUE JUST IN CASE   'title' => 'required|string|unique:posts,title|min:2|max:191', 
        $rules = [
            'title' => 'required|string|min:2|max:191',
            'description'  => 'required|string|min:5|max:1000',
        ];
        //custom validation error messages
        $messages = [
            'title.required' => 'post title is required', //syntax: field_name.rule
            'title.min' => 'Post must be at least 2 characetrs'
        ];

        
        //First Validate the form data

        //request object as parameter used to access form data
        $request->validate($rules,$messages);
        //Create a post
        $post = new post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = Auth::user()->id;
        $post->save(); // save it to the database.
        //Redirect to a specified route with flash message.
        return redirect()
            ->route('posts.index')
            ->with('status','Created a new post!');
    }

    /**
     * Display the specified resource.
     */


    public function show($id)
    {
        $post = Post::findOrFail($id);
            return view('posts.show', [
                'post' =>$post,
            ]);
    }
//
    /**
     * Show the form for editing the specified resource.
     */


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit',[
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, string $id)
    {
        $rules = [
            'title' => 'required|string|min:2|max:191',
            'description'  => 'required|string|min:5|max:1000',
        ];

        $messages = [
            'title.required' => 'post title is required', //syntax: field_name.rule
            'title.min' => 'Post must be at least 2 characetrs'
        ];

        $request->validate($rules, $messages);
        $post               = Post::findOrFail($id);
        $post->title        = $request->title;
        $post->description  = $request->description;
        $post->save();

        return redirect()
            ->route('posts.show', $id)
            ->with('status', 'Updated the selected Post! :)');
    }

    /**
     * Remove the specified resource from storage.
     */


    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('status','Deleted the selected Post!');
    }

    //public function __construct(){
    //    $this->middleware('auth');
    //}
}
