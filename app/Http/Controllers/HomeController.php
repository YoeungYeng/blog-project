<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
class HomeController extends Controller
{
    // index
    public function index()
    {
        $categories = Category::all();
        // $posts = Post::latest()->get();
        $posts = Post::when(request('category_id'), function ($query) {
            $query->where('category_id', request('category_id'));
        })->latest()->get();
        return view('home', compact('categories', 'posts'));
    }
}
