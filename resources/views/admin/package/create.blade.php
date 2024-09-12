@extends('layouts.templateadmin')

@section('title', 'Tambah Paket')

@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <a href="{{ route('admin.package.index') }}" class="btn btn-warning mb-4">Kembali</a>
            <form action="{{ route('admin.package.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Row Nama Paket -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Nama Paket</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>
                    </div>
                </div>

                <!-- Row Kategori dan Subkategori -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id">Kategori</label>
                            <select name="category_id" class="form-control" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="subcategory_id">Subkategori</label>
                            <select name="subcategory_id" class="form-control" required>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{ old('subcategory_id') == $subcategory->id ? 'selected' : '' }}>
                                        {{ $subcategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Row Tanggal Keberangkatan dan Tanggal Pulang -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="departure_date">Tanggal Berangkat</label>
                            <input type="date" class="form-control" name="departure_date" value="{{ old('departure_date') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="return_date">Tanggal Pulang</label>
                            <input type="date" class="form-control" name="return_date" value="{{ old('return_date') }}" required>
                        </div>
                    </div>
                </div>

                <!-- Row Lokasi Berangkat dan Tujuan -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="departure_location">Lokasi Berangkat</label>
                            <input type="text" class="form-control" name="departure_location" value="{{ old('departure_location') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="destination_location">Lokasi Tujuan</label>
                            <input type="text" class="form-control" name="destination_location" value="{{ old('destination_location') }}" required>
                        </div>
                    </div>
                </div>

                <!-- Row Nama Maskapai dan Deskripsi -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="airline_name">Nama Maskapai</label>
                            <input type="text" class="form-control" name="airline_name" value="{{ old('airline_name') }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control summernote" name="description" rows="3" required>{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Row Harga Normal, Diskon, dan Harga Diskon -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="normal_price">Harga Normal</label>
                            <input type="number" class="form-control" name="normal_price" value="{{ old('normal_price') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="discount_percent">Diskon (%)</label>
                            <input type="number" class="form-control" name="discount_percent" value="{{ old('discount_percent') }}">
                        </div>
                    </div>
                </div>

                <!-- Row Kuota dan Status -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="quota">Kuota</label>
                            <input type="number" class="form-control" name="quota" value="{{ old('quota') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="unpublished" {{ old('status') == 'unpublished' ? 'selected' : '' }}>Unpublished</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Row Gallery -->
                <div class="row">
                    <div class="col-md-12">
                        <div id="gallery-wrapper">
                            <div class="form-group gallery-input">
                                <label for="">Galeri</label>
                                <button type="button" class="btn btn-success btn-sm float-right" id="add-gallery-btn">Tambah Gambar</button>
                                <input type="file" class="form-control dropify mt-3" name="image[]" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row Package Include -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="include">Include</label>
                            <textarea class="form-control summernote" name="include_item" rows="3" required>{{ old('include_item') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Row Package Exclude -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exclude">Exclude</label>
                            <textarea class="form-control summernote" name="exclude_item" rows="3" required>{{ old('exclude_item') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Row Itinerary -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="itinerary">Itinerary</label>
                            <textarea class="form-control summernote" name="itinerary_desc" rows="3" required>{{ old('itinerary_desc') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan Paket</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var galleryWrapper = document.getElementById('gallery-wrapper');
            var addGalleryBtn = document.getElementById('add-gallery-btn');

            function initializeDropify() {
                $('.dropify').dropify();
            }

            addGalleryBtn.addEventListener('click', function () {
                var newGalleryInput = document.createElement('div');
                newGalleryInput.classList.add('form-group', 'gallery-input');
                newGalleryInput.innerHTML = `
                    <label for="">Galeri</label>
                    <button type="button" class="btn btn-danger btn-sm remove-gallery-btn float-right">Hapus</button>
                    <input type="file" class="form-control dropify mt-3" name="image[]" required>
                `;
                galleryWrapper.appendChild(newGalleryInput);

                  // Initialize Dropify for the newly added field
             initializeDropify();


                // Tambahkan event listener untuk tombol Hapus di field yang baru
                newGalleryInput.querySelector('.remove-gallery-btn').addEventListener('click', removeGalleryField);
            });

        
            galleryWrapper.addEventListener('click', function (e) {
                if (e.target && e.target.classList.contains('remove-gallery-btn')) {
                    var galleryInput = e.target.closest('.gallery-input');
                    galleryWrapper.removeChild(galleryInput);
                }
            });

            function removeGalleryField(e) {
                var galleryInput = e.target.closest('.gallery-input');
                galleryWrapper.removeChild(galleryInput);
            }
        });
    </script>
@endsection
