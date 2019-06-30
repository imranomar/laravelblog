<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(2);
        $categories = Category::all();
        return view('front/home',compact('posts','categories'));
    }

    public function post($slug)
    {
        $categories = Category::all();
        $post = Post::where('id','=',3)->first();
        $comments = $post->comments;
        return view('post',compact('post','comments','categories'));
    }
}
