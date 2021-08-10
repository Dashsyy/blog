<?php

namespace App\Http\Controllers;

use App\Category;
use Session;
use Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {

        $categories = Category::all();
        return view('category.index')->with('categories', $categories);
    }
    public function create()
    {
        return view('category.create');
    }
    //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        // Create The Category
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        Session::flash('category_create', 'New category is created');
        return redirect('category/create');
    }
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('category.edit')->with('categories', $categories);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20|min:3',
        ]);
        $category = new Category;

        if ($validator->fails()) {
            return redirect('category/' . $category->id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }

        // Create The Category

        $category = Category::find($id);
        $category->name = $request->Input('name');
        $category->save();

        Session::flash('category_update', 'Category is Update');

        return redirect('category');
    }
}
