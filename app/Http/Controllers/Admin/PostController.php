<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        if($request->get('search')){
            $posts = Post::where('title','like','%'.$request->get('search').'%')
                ->orderBy('id','desc')
                ->paginate('10');
        }else{
            $posts = Post::orderBy('id','desc')
                ->paginate('10');
        }
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::pluck('name','id');
        return view('admin.posts.create',compact('categories'));
    }

    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['active'] = $request->get('active') ? true : false;
        $post = Post::create($data);
        $post->categories()->sync($request->get('categories'));
        return redirect()->route('admin.posts.index');

    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::pluck('name','id');
        return view('admin.posts.edit', compact('post','categories'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $data = $request->all();
        $data['active'] = $request->get('active') ? true : false;
        $post->update($data);
        $post->categories()->sync($request->get('categories'));
        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
