<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if($request->get('search')){
            $posts = Post::where('title','like','%'.$request->get('search').'%')
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
}
