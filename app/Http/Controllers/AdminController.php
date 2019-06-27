<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;

class AdminController extends Controller
{
    //
    public function index()
    {
        $post_count = Post::count();
        $category_count = Category::count();
        $comment_count = Comment::count();
        return view('admin.index',compact('post_count','category_count', 'comment_count'));


    }
}
