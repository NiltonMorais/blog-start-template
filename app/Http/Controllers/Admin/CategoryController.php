<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if($request->get('search')){
            $categories = Category::where('name','like','%'.$request->get('search').'%')
                ->orderBy('id','desc')
                ->paginate('10');
        }else{
            $categories = Category::orderBy('id','desc')
                ->paginate('10');
        }

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['active'] = $request->get('active') ? true : false;
        Category::create($data);
        return redirect()->route('admin.categories.index');

    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->all();
        $data['active'] = $request->get('active') ? true : false;
        $category->update($data);
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
