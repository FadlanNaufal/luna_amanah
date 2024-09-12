<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategory = Subcategory::with('category')->get();
        return view('admin.subcategory.index', compact('subcategory'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categoris,id'
        ]);

        Subcategory::create($request->all());
        return redirect()->route('admin.subcategory.index')->with('success', 'Subcategory created successfully');
    }

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categoris,id'
        ]);

        $subcategory = Subcategory::findOrFail($id);
        $subcategory->update($request->all());

        return redirect()->route('admin.subcategory.index')->with('success', 'Subcategory updated successfully');
    }

    public function delete($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();

        return redirect()->route('admin.subcategory.index')->with('success', 'Subcategory deleted successfully');
    }
}
