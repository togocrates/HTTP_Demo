<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index()
    {
        // If the request expects JSON (AJAX/API), return JSON array of posts
        if (request()->expectsJson()) {
            return response()->json(Post::all());
        }
        // Otherwise, return the Blade view
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $post = Post::create($validated);
        return response()->json($post, 201);
    }

    public function show(Post $post)
    {
        return response()->json($post);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ]);
        $post->update($validated);
        return response()->json($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(null, 204);
    }

    public function patch(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
        ]);
        $post->update($validated);
        return response()->json($post);
    }

    public function head(Post $post)
    {
        return response('', 200);
    }

    public function options()
    {
        return response('', 200)->header('Allow', 'GET,POST,PUT,DELETE,PATCH,HEAD,OPTIONS');
    }

    public function resetDemo()
    {
        \App\Models\Post::truncate();
        \App\Models\Post::factory()->count(3)->create();
        // Always return the current posts as an array for frontend robustness
        return response()->json(\App\Models\Post::all());
    }
}
