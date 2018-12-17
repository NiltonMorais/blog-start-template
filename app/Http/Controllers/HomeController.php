<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if($request->get('search')){
            $posts = Post::
                where('active', 1)
                ->where('title','like','%'.$request->get('search').'%')
                ->orderBy('id','desc')
                ->paginate('10');
        }else{
            $posts = Post::
                where('active', 1)
                ->orderBy('id','desc')
                ->paginate('10');
        }
        return view('home', compact('posts'));
    }

    public function post(Post $post)
    {
        return view('post', compact('post'));
    }

    public function category(Request $request, Category $category)
    {
        if($request->get('search')){
            $posts = $category->Posts()
                ->where('active', 1)
                ->where('title','like','%'.$request->get('search').'%')
                ->where('category_id', $category->id)
                ->orderBy('id','desc')
                ->paginate('10');
        }else{
            $posts = $category->Posts()
                ->where('active', 1)
                ->where('category_id', $category->id)
                ->orderBy('id','desc')
                ->paginate('10');
        }
        return view('home', compact('posts'));
    }
}
