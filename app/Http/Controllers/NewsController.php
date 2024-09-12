<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view ('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'title' => 'required|string',
            'image_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
        ]);

        // Generate slug dari title
        $slug = Str::slug($validatedData['title']);

        // Proses penyimpanan gambar thumbnail
        if ($request->hasFile('image_thumbnail')) {
            $file = $request->file('image_thumbnail');
            $fileName = $request->title . '_gambar_' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/thumbnails'), $fileName);
        } else {
            $imagePath = null;
        }

        // Simpan data berita ke database
        News::create([
            'title' => $validatedData['title'],
            'slug' => $slug,
            'content' => $validatedData['content'],
            'image_thumbnail' => $fileName,
            'author_id' => 1, // Default author_id
            'status' => 'archived', // Default status
            'published_at' => null, // Default published_at
            'created_at' => now(),
        ]);

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view ('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'title' => 'required|string',
            'image_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
        ]);

        // Temukan berita berdasarkan ID
        $news = News::findOrFail($id);

        // Generate slug dari title
        $slug = Str::slug($validatedData['title']);

        // Proses penyimpanan gambar thumbnail
        $fileName = $news->image_thumbnail; // Default to existing file name if no new image is uploaded
        if ($request->hasFile('image_thumbnail')) {
            // Hapus gambar lama jika ada
            if ($fileName && Storage::exists('public/images/thumbnails/' . $fileName)) {
                Storage::delete('public/images/thumbnails/' . $fileName);
            }

            // Simpan gambar baru
            $file = $request->file('image_thumbnail');
            $fileName = 'gambar_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/thumbnails'), $fileName);
        }

        // Update data berita di database
        $news->update([
            'title' => $validatedData['title'],
            'slug' => $slug,
            'content' => $validatedData['content'],
            'image_thumbnail' => $fileName,
            'status' => 'archived', // Default status
        ]);

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diupdate.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        // Temukan berita berdasarkan ID
        $news = News::findOrFail($id);

        // Hapus gambar thumbnail jika ada
        if ($news->image_thumbnail && Storage::exists('public/images/thumbnails/' . $news->image_thumbnail)) {
            Storage::delete('public/images/thumbnails/' . $news->image_thumbnail);
        }

        // Hapus berita dari database
        $news->delete();

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }


}