<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class WebPostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'comments')->get();
        return view('layouts.dashboard', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('layouts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('dashboard')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        if ($post->user_id != auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to edit this post.');
        }
        return view('layouts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id != auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to update this post.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id != auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to delete this post.');
        }

        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Post deleted successfully.');
    }
}
