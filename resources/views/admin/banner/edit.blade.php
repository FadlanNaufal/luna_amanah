@extends('layouts.templateadmin')

@section('title','Edit Banner')

@section('header')
    <div class="section-header">
        <h1>Edit Banner</h1>
    </div>
@endsection
@section('content')

<div class="row">
   <div class="col-8 offset-2">
    <a href="{{route('admin.banner.index')}}" class="btn btn-warning mb-4">Kembali</a>
        <form action="{{route('admin.banner.update', $banner->id)}}" method="post" enctype="multipart/form-data">
            
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="image">Banner Image</label>
                <input type="file" class="form-control dropify" name="image" data-default-file="{{ asset('assets/images/banner/' . $banner->image) }}">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
            </div>
            <div class="form-group">
                <label for="menu_location">Menu Location</label>
                <select name="menu_location" class="form-control">
                    <option value="home" {{ $banner->menu_location == 'home' ? 'selected' : '' }}>Halaman Home</option>
                    <option value="tentang_kami" {{ $banner->menu_location == 'tentang_kami' ? 'selected' : '' }}>Halaman Tentang Kami</option>
                    <option value="paket" {{ $banner->menu_location == 'paket' ? 'selected' : '' }}>Halaman Paket</option>
                    <option value="galeri" {{ $banner->menu_location == 'galeri' ? 'selected' : '' }}>Halaman Galeri</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" required>
                    <option value="published" {{ $banner->status == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="unpublished" {{ $banner->status == 'unpublished' ? 'selected' : '' }}>Unpublished</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection
