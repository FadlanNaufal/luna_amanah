<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::all();
        return view ('admin.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'menu_location' => 'required|string|max:255',
            'status' => 'required|in:published,unpublished', // Validasi status
        ]);

        // Proses penyimpanan gambar thumbnail
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'banner_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/banner'), $fileName);
        } else {
            $fileName = null;
        }

        // Simpan data ke database
        Banner::create([
            'image' => $fileName,
            'menu_location' => $validatedData['menu_location'],
            'status' => $validatedData['status'],
        ]);

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('admin.banner.index')->with('success', 'Menu banner berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        // Validasi input dari form
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'menu_location' => 'required|string|max:255',
            'status' => 'required|in:published,unpublished',
        ]);

        // Proses update gambar banner
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'banner_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/banner'), $fileName);
            $banner->image = $fileName;
        }

        // Update data di database
        $banner->menu_location = $validatedData['menu_location'];
        $banner->status = $validatedData['status'];
        $banner->save();

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('admin.banner.index')->with('success', 'Menu banner berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        // Ambil data banner berdasarkan id
        $banner = Banner::findOrFail($id);
        if ($banner->image && file_exists(public_path('assets/images/banner/' . $banner->image))) {
            // Hapus file gambar dari folder
            unlink(public_path('assets/images/banner/' . $banner->image));
        }

        // Hapus data banner dari database
        $banner->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil dihapus beserta gambarnya.');
    }
}
