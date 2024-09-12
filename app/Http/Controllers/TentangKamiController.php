<?php

namespace App\Http\Controllers;

use App\Models\TentangKami;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = TentangKami::all();
        $dataCount = $about->count();
        return view ('admin.about.index', compact('about','dataCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'embed_youtube_link' => 'required|url',
            'content' => 'required|string',
        ]);

        // Simpan data berita ke database
        TentangKami::create([
            'embed_youtube_link' => $validatedData['embed_youtube_link'],
            'content' => $validatedData['content'],
            'status' => 'unpublished', // Default status
            'created_at' => now(),
        ]);

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('admin.tentangkami.index')->with('success', 'Konten tentang kami berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TentangKami $tentangKami)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tentangKami = TentangKami::findOrFail($id);
        return view('admin.about.edit', compact('tentangKami'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'embed_youtube_link' => 'required|url',
            'content' => 'required|string',
            'status' => 'required|string',
        ]);

        // Temukan data berdasarkan ID
        $tentangKami = TentangKami::findOrFail($id);

        // Update data berita di database
        $tentangKami->update([
            'embed_youtube_link' => $validatedData['embed_youtube_link'],
            'content' => $validatedData['content'],
            'status' => $validatedData['status'], // Status tetap unpublished
            'updated_at' => now(),
        ]);

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('admin.tentangkami.index')->with('success', 'Konten tentang kami berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $tentangKami = TentangKami::findOrFail($id);
        $tentangKami->delete();
        return redirect()->route('admin.tentangkami.index')->with('success', 'Konten tentang kami berhasil dihapus.');
    }
}
