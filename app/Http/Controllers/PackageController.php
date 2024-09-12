<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Package;
use App\Models\PackageInclude;
use App\Models\PackageGallery;
use App\Models\PackageExclude;
use App\Models\PackageItinerary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $package = Package::all();
        return view ('admin.package.index',compact('package'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data kategori dan subkategori
        $categories = Category::all();
        $subcategories = Subcategory::all();

        // Tampilkan view dengan compact untuk mengirim data ke view
        return view('admin.package.create', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categoris,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'departure_date' => 'required|date',
            'return_date' => 'required|date',
            'departure_location' => 'required|string|max:255',
            'destination_location' => 'required|string|max:255',
            'airline_name' => 'required|string|max:255',
            'description' => 'required|string',
            'normal_price' => 'required|numeric|min:0',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'quota' => 'required|numeric|min:0',
            'status' => 'required|string',
            'image.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'include_item' => 'required|string',
            'exclude_item' => 'required|string',
            'itinerary_desc' => 'required|string',
        ]);

        // Calculate Discounted Price
        $normalPrice = $validatedData['normal_price'];
        $discountPercent = $validatedData['discount_percent'] ?? 0; // Default to 0 if not provided

        $discountedPrice = $normalPrice - ($normalPrice * ($discountPercent / 100));

        // return $discountedPrice;

        // Save Package Data
        $package = Package::create([
            'name' => $validatedData['name'],
            'category_id' => $validatedData['category_id'],
            'subcategory_id' => $validatedData['subcategory_id'],
            'departure_date' => $validatedData['departure_date'],
            'return_date' => $validatedData['return_date'],
            'departure_location' => $validatedData['departure_location'],
            'destination_location' => $validatedData['destination_location'],
            'airline_name' => $validatedData['airline_name'],
            'description' => $validatedData['description'],
            'normal_price' => $normalPrice,
            'discount_percent' => $discountPercent,
            'discounted_price' => $discountedPrice,
            'quota' => $validatedData['quota'],
            'status' => $validatedData['status'],
        ]);

        // Save Gallery Images
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $fileName = 'gallery_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/gallery-package'), $fileName);

                PackageGallery::create([
                    'package_id' => $package->id,
                    'image' => $fileName,
                ]);
            }
        }

        // Save Package Include
        PackageInclude::create([
            'package_id' => $package->id,
            'include_item' => $validatedData['include_item'],
        ]);

        // Save Package Exclude
        PackageExclude::create([
            'package_id' => $package->id,
            'exclude_item' => $validatedData['exclude_item'],
        ]);

        // Save Package Itinerary
        PackageItinerary::create([
            'package_id' => $package->id,
            'itinerary_desc' => $validatedData['itinerary_desc'],
        ]);

        return redirect()->route('admin.package.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $package = Package::findOrFail($id);
        $includeItems = PackageInclude::where('package_id', $id)->first();
        $excludeItems = PackageExclude::where('package_id', $id)->first();
        $itineraryItems = PackageItinerary::where('package_id', $id)->first();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $galleryImages = PackageGallery::where('package_id', $id)->get();

        

        return view('admin.package.edit', compact(
            'package', 
            'includeItems', 
            'excludeItems', 
            'itineraryItems', 
            'categories', 
            'subcategories', 
            'galleryImages'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categoris,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'departure_date' => 'required|date',
            'return_date' => 'required|date',
            'departure_location' => 'required|string|max:255',
            'destination_location' => 'required|string|max:255',
            'airline_name' => 'required|string|max:255',
            'description' => 'required|string',
            'normal_price' => 'required|numeric|min:0',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'quota' => 'required|numeric|min:0',
            'status' => 'required|string',
            'image.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'include_item' => 'required|string',
            'exclude_item' => 'required|string',
            'itinerary_desc' => 'required|string',
        ]);

        // Calculate Discounted Price
        $normalPrice = $validatedData['normal_price'];
        $discountPercent = $validatedData['discount_percent'] ?? 0; // Default to 0 if not provided
        $discountedPrice = $normalPrice - ($normalPrice * ($discountPercent / 100));

        // Find and Update the Package
        $package = Package::findOrFail($id);
        $package->update([
            'name' => $validatedData['name'],
            'category_id' => $validatedData['category_id'],
            'subcategory_id' => $validatedData['subcategory_id'],
            'departure_date' => $validatedData['departure_date'],
            'return_date' => $validatedData['return_date'],
            'departure_location' => $validatedData['departure_location'],
            'destination_location' => $validatedData['destination_location'],
            'airline_name' => $validatedData['airline_name'],
            'description' => $validatedData['description'],
            'normal_price' => $normalPrice,
            'discount_percent' => $discountPercent,
            'discounted_price' => $discountedPrice,
            'quota' => $validatedData['quota'],
            'status' => $validatedData['status'],
        ]);

        // Get existing images
        $existingImages = PackageGallery::where('package_id', $id)->pluck('image')->toArray();

        // Initialize array for new images
        $newImages = [];

        // Handle new image uploads
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $fileName = 'gallery_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/gallery-package'), $fileName);
                $newImages[] = $fileName;

                // Save new image record
                PackageGallery::updateOrCreate(
                    ['image' => $fileName, 'package_id' => $package->id],
                    ['image' => $fileName]
                );
            }
        }

        // Determine images to delete
        $imagesToDelete = array_diff($existingImages, $newImages);

        // Delete old images that are no longer present
        foreach ($imagesToDelete as $image) {
            File::delete(public_path('assets/images/gallery-package/' . $image));
            PackageGallery::where('package_id', $package->id)->where('image', $image)->delete();
        }

        // Save Package Include
        PackageInclude::updateOrCreate(
            ['package_id' => $package->id],
            ['include_item' => $validatedData['include_item']]
        );

        // Save Package Exclude
        PackageExclude::updateOrCreate(
            ['package_id' => $package->id],
            ['exclude_item' => $validatedData['exclude_item']]
        );

        // Save Package Itinerary
        PackageItinerary::updateOrCreate(
            ['package_id' => $package->id],
            ['itinerary_desc' => $validatedData['itinerary_desc']]
        );

        return redirect()->route('admin.package.index')->with('success', 'Paket berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        // Temukan paket berdasarkan ID atau tampilkan error 404 jika tidak ditemukan
        $package = Package::findOrFail($id);

        // Hapus data terkait menggunakan nama model
        $packageExcludes = PackageExclude::where('package_id', $package->id)->get();
        $packageIncludes = PackageInclude::where('package_id', $package->id)->get();
        $packageItineraries = PackageItinerary::where('package_id', $package->id)->get();
        $packageGalleries = PackageGallery::where('package_id', $package->id)->get();

        // Hapus gambar dari folder dan data dari database
        foreach ($packageGalleries as $gallery) {
            $filePath = public_path('assets/images/gallery-package/' . $gallery->image);
            if (file_exists($filePath)) {
                unlink($filePath); // Hapus file gambar
            }
        }

        // Hapus data terkait
        PackageExclude::where('package_id', $package->id)->delete();
        PackageInclude::where('package_id', $package->id)->delete();
        PackageItinerary::where('package_id', $package->id)->delete();
        PackageGallery::where('package_id', $package->id)->delete();

        // Hapus paket
        $package->delete();

        return redirect()->route('admin.package.index')->with('success', 'Paket berhasil dihapus.');
    }
}
