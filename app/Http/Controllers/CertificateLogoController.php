<?php

namespace App\Http\Controllers;

use App\Models\CertificateLogo;
use Illuminate\Http\Request;

class CertificateLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logos = CertificateLogo::all();
        return view('admin.certificate-logo.index', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.certificate-logo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image
            'status' => 'required|in:published,unpublished'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/logos'), $fileName);
        } else {
            $fileName = null;
        }

        // Simpan data ke database
        CertificateLogo::create([
            'name' => $request->input('name'),
            'image' => $fileName, // Menyimpan nama file ke database
            'status' => $request->input('status'),
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.certificate-logo.index')->with('success', 'Logo berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CertificateLogo $certificateLogo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $logo = CertificateLogo::findOrfail($id);
        return view('admin.certificate-logo.edit', compact('logo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image
            'status' => 'required|in:published,unpublished'
        ]);

        $logo = CertificateLogo::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
          
            $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            $file->move(public_path('assets/images/logos'), $fileName);

            
            if ($logo->image && file_exists(public_path('assets/images/logos/' . $logo->image))) {
                unlink(public_path('assets/images/logos/' . $logo->image));
            }
        } else {
         
            $fileName = $logo->image;
        }

      
        $logo->update([
            'name' => $request->input('name'),
            'image' => $fileName, // Update nama file jika ada perubahan
            'status' => $request->input('status'),
        ]);

      
        return redirect()->route('admin.certificate-logo.index')->with('success', 'Logo berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
    
        $logo = CertificateLogo::findOrFail($id);

    
        if ($logo->image && file_exists(public_path('assets/images/logos/' . $logo->image))) {
            unlink(public_path('assets/images/logos/' . $logo->image));
        }

    
        $logo->delete();

    
        return redirect()->route('admin.certificate-logo.index')->with('success', 'Logo berhasil dihapus.');
    }
}
