<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // show
    public function index()
    {
        $posts = Post::latest()->get();
        $categories = Category::all();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        //
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }
    public function store(Request $request)
    {
        Post::create([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('posts.index');
    }
    public function edit(Post $post)
    {
        // categories
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'category_id' => $request->input('category_id'),
        ]);
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }

}
