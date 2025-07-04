<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Complaint;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function adminIndex()
    {
        return view('admin.index');
    }

    public function packages()
    {
        $posts = Post::where('category', 'package')->get();
        return view('pages.packages', compact('posts'));
    }

    public function trai()
    {
        $posts = Post::where('category', 'trai')->get();
        return view('pages.trai', compact('posts'));
    }

    public function news()
    {
        $posts = Post::where('category', 'news')->get();
        return view('pages.news', compact('posts'));
    }

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:package,trai,news',
            'file' => 'nullable|file|mimes:pdf|max:20480', // max 20MB
        ]);

        $data = $validated;

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('posts', 'public');
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|in:package,trai,news',
        ]);

        $post->update($request->all());

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}