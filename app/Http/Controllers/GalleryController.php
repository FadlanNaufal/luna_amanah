<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::all();
        return view ('admin.gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view ('admin.gallery.create', compact('category'));
    }


    public function getSubcategories($categoryId)
    {
        $subcategories = Subcategory::where('category_id', $categoryId)->get();
        return response()->json($subcategories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categoris,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'status' => 'required',
        ]);

        // Proses penyimpanan gambar thumbnail
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'galeri_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/galeri'), $fileName);
        } else {
            $fileName = null;
        }

        // Simpan data ke database
        Gallery::create([
            'title' => $request->input('title'),
            'image' => $fileName,
            'category_id' => $request->input('category_id'),
            'subcategory_id' => $request->input('subcategory_id'),
            'status' => $request->input('status'),
        ]);

        // Redirect atau response setelah penyimpanan
        return redirect()->route('admin.galeri.index')->with('success', 'Gallery berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $categories = Category::all();
        $subcategories = Subcategory::where('category_id', $gallery->category_id)->get();

        return view('admin.gallery.edit', compact('gallery', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'subcategory_id' => 'required|integer',
            'status' => 'required|in:published,unpublished',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Update data galeri
        $gallery->title = $request->input('title');
        $gallery->category_id = $request->input('category_id');
        $gallery->subcategory_id = $request->input('subcategory_id');
        $gallery->status = $request->input('status');

        // Proses penyimpanan gambar thumbnail jika ada file baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($gallery->image && file_exists(public_path('assets/images/galeri/' . $gallery->image))) {
                unlink(public_path('assets/images/galeri/' . $gallery->image));
            }

            // Simpan gambar baru
            $file = $request->file('image');
            $fileName = 'galeri_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/galeri'), $fileName);
            $gallery->image = $fileName;
        }

        $gallery->save();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete( $id)
    {
        
        $gallery = Gallery::findOrFail($id);

       
        if ($gallery->image) {
            $imagePath = public_path('assets/images/galeri/' . $gallery->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        
        $gallery->delete();

       
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
}
