<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->get();

        if ($posts->isEmpty()) {
            // No posts found
            return view('posts.index', ['posts' => []]);
        }

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // You can add logic here if needed
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // Create a new post
        Post::create([
            'content' => $request->input('content'),
            'created_by' => auth()->user()->id,
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');

    }

    // Other methods (show, edit, update, destroy) can be implemented as needed


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // Update the post
        $post->update([
            'content' => $request->input('content'),
        ]);
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }



}
