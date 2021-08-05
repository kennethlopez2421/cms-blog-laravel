<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

        return view('Welcome')
        ->with('categories', Category::all())
        ->with('tags', Tag::all())
        ->with('posts', Post::searched()->paginate(2));
    }
}
