<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimoni = Testimoni::all();
        return view('admin.testimoni.index', compact('testimoni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimoni.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'package_name' => 'required|string|max:255',
            'rating' => 'required|in:1,2,3,4,5',
            'content' => 'required',
        ]);

        Testimoni::create($validatedData + ['status' => 'unpublished']);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'package_name' => 'required|string|max:255',
            'rating' => 'required|in:1,2,3,4,5',
            'content' => 'required',
            'status' => 'required|in:unpublished,published'
        ]);

        $testimoni->update($validatedData);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();
        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
