<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validatedData =$request->validate([
            'users_id' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);
        $post = Post::create([
            'users_id' => $validatedData ['users_id'],
            'image' => $validatedData ['image'],
            'description' => $validatedData ['description']
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = 'C:\Users\YC\Desktop\TheaMaroc\TheaMaroc-1\src\assets\img\post';
            $filename = $image->getClientOriginalName();
            $image->move($path, $filename);
            $post->image =$filename;
            $post->save();
        }
        return response()->json([
            'message' => 'post created successfully',
            'post' => $post
        ], 201);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }
}
