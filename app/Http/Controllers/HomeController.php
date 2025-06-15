<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // index
    public function index(){
        $categories = Category::all();
        return view('home', ['categories' => $categories]);
    }
}
