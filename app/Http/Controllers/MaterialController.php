<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Material;

class MaterialController extends Controller
{
    public function index()
    {
        $material_list = Material::join('categories as c', 'materials.category_id', '=', 'c.id')
                        ->select('materials.id','materials.name as material_name','c.name as category_name','materials.opening_balance','materials.updated_at')
                        ->get();
        $material_list = $material_list->toArray();
        return view('material.material_list_view', compact('material_list'));
    }

    public function create()
    {
        $categories = Category::select("id","name")->get();
        return view('material.add_material_view', compact('categories'));
    }

    public function edit(int $id)
    {
        $materials = Material::findOrFail($id);
        $category_name = $materials->category->name;
        $categories = Category::select("id","name")->get();
        return view('material.edit_material_view', compact('materials','category_name','categories'));
    }

    public function store(Request $request)
    {
        $name = $request->input()['name'];
        $category_id = $request->input()['category'];
        $balance = $request->input()['balance'];
        Material::create([
            'name' => $name,
            'category_id' => $category_id,
            'opening_balance' => $balance
        ]);
        return back()->with("success", "Material added successfully");
    }

    public function update(Request $request)
    {
        $name = $request->input()['name'];
        $category_id = $request->input()['category'];
        $balance = $request->input()['balance'];
        $material  = Material::findOrFail($request->input()['id']);
        $material->update([
            'name' => $name,
            'category_id' => $category_id,
            'opening_balance' => $balance
        ]);
        return back()->with("success", "Material updated successfully");
    }

    public function destroy(int $id)
    {
        $material = findOrFail($id);
        $material->delete();
        return view('material.material_list_view');
    }
}
