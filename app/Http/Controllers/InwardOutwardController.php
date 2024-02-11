<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Material;
use App\Models\InwardOutwardMaster;
use Illuminate\Support\Facades\DB;

class InwardOutwardController extends Controller
{
    public function create()
    {
        $categories = Category::select("id","name")->get();
        $materials = Material::select("id","name")->get();
        return view('iomaster.add_inward_outward_record_view', compact('categories','materials'));
    }

    public function store(Request $request)
    {
        $category = $request->input()['category'];
        $material = $request->input()['material'];
        $entry_date = $request->input()['entry_date'];
        $quantity = $request->input()['quantity'];
        InwardOutwardMaster::create([
            'category_id' => $category,
            'material_id' => $material,
            'quantity' => $quantity,
            'entry_date' => $entry_date
        ]);
        return back()->with("success", "Quantity added successfully");
    }

    public function edit(int $id)
    {
        $categories = Category::select("id","name")->get();
        $materials = Material::select("id","name")->get();
        $editiomaster = InwardOutwardMaster::findOrFail($id);
        $material_name = $editiomaster->material->name;
        $category_name = $editiomaster->material->category->name;
        return view('iomaster.edit_inward_outward_record_view', compact('categories','materials','editiomaster','category_name','material_name'));
    }

    public function update(Request $request)
    {
        $category = $request->input()['category'];
        $material = $request->input()['material'];
        $entry_date = $request->input()['entry_date'];
        $quantity = $request->input()['quantity'];
        $updateIOMaster = InwardOutwardMaster::findOrFail($request->input()['id']);
        $updateIOMaster->update([
            'category_id' => $category,
            'material_id' => $material,
            'quantity' => $quantity,
            'entry_date' => $entry_date
        ]);
        return back()->with("success", "Quantity added successfully");
    }

    public function index()
    {
        $iolist = InwardOutwardMaster::join('categories as c', 'inward_outward_masters.category_id', '=', 'c.id')
                                        ->join('materials as m', 'inward_outward_masters.material_id', '=', 'm.id')
                                        ->select('c.name as category_name','m.name as material_name','m.opening_balance','inward_outward_masters.quantity',DB::raw('(opening_balance + quantity) as current_balance'),'inward_outward_masters.updated_at','inward_outward_masters.id')
                                        ->get()->toArray();
        return view('iomaster.inward_outward_list_view',compact('iolist'));                           
    }

    public function destroy(int $id)
    {
        $deleteRecord = InwardOutwardMaster::findOrFail($id);
        $deleteRecord->delete();
        return back();
    }
}
