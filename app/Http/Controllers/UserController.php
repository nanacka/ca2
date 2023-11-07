<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('username')->paginate(8);
        return view('posts.index', [
            'users' =>$users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'username' => 'required|string|unique:users,username|min:3|max:150',
            //'email' => 'required|string|unique:users,email|min:3|max:150',

        ];

        $messages = [
            'title.unique' => 'Todo title should be unique'
        ];

        $request->validate($rules, $messages);

        $user = new User;
        $user->title = $request->username;
        $user->save();

        return redirect()
                ->route('users.index')
                ->with('status','created a new User');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
