    @extends('layouts.templateadmin')

    @section('title','Banner')

    @section('header')
        <div class="section-header">
            <h1>Banner</h1>
        </div>
    @endsection
    @section('content')

    <div class="row">
    <div class="col-8 offset-2">
        <a href="{{route('admin.banner.index')}}" class="btn btn-warning mb-4">Kembali</a>
            <form action="{{route('admin.banner.store')}}" method="post" enctype="multipart/form-data">
                
                @csrf
                <div class="form-group">
                    <label for="image">Banner Image</label>
                    <input type="file" class="form-control dropify" name="image" required>
                </div>
                <div class="form-group">
                    <label for="menu_location">Menu Location</label>
                    <select name="menu_location" id="" class="form-control">
                        <option value="home">Halaman Home</option>
                        <option value="tentang_kami">Halaman Tentang Kami</option>
                        <option value="paket">Halaman Paket</option>
                        <option value="galeri">Halaman Galeri</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" required>
                        <option value="published">Published</option>
                        <option value="unpublished">Unpublished</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    @endsection
