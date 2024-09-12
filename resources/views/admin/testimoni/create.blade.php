@extends('layouts.templateadmin')

@section('title', 'Tambah Testimoni')

@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <a href="{{ route('admin.testimoni.index') }}" class="btn btn-warning mb-4">Kembali</a>
            <form action="{{ route('admin.testimoni.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="package_name">Nama Paket</label>
                    <input type="text" class="form-control" name="package_name" required>
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <select class="form-control" name="rating" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Konten</label>
                    <textarea name="content" class="form-control summernote" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
