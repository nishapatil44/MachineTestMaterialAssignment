<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //Display a listing of the categories.
    public function index()
    {
        $categories_list = Category::select('id','name','updated_at')->orderBy('updated_at','desc')->get();
        $categories_list = $categories_list->toArray();
        return view('category.category_list_view',compact('categories_list'));
    }

    //Create or add new category
    public function create()
    {
        return view('category.add_category_view');
    }

    //Store a newly created category in storage.
    public function store(Request $request)
    {
        $name = $request->input()['name'];
        $request->validate([
            'name' => 'required'
        ]);
        Category::create(['name'=> $name]);
        return back()->with("success", "Category added successfully");
    }

    //Show the form for editing the specified resource.
    public function edit(int $id)
    {
        $category = Category::findOrFail($id); //ModelNotFoundException if not found
        $category = $category->toArray();
        return view('category.edit_category_view', compact('category'));
    }

    //Update the specified resource in storage
    public function update(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $request->validate([
            'name' => 'required'
        ]);
        $category = Category::find($id);
        $category->update(['name'=> $name]);
        return back()->with("success", "Category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $category = Category::find($id);
        $category->delete();
        return view('category.category_list_view');
    }
}
