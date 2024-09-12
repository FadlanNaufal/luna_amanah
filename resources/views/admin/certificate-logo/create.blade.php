@extends('layouts.templateadmin')

@section('title','Logo Sertifikasi')

@section('header')
    <div class="section-header">
        <h1>Logo Sertifikasi</h1>
    </div>
@endsection
@section('content')

<div class="row">
<div class="col-8 offset-2">
    <a href="{{route('admin.certificate-logo.index')}}" class="btn btn-warning mb-4">Kembali</a>
        <form action="{{ route('admin.certificate-logo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="image">Upload Gambar</label>
                <input type="file" class="form-control dropify" name="image">
            </div>
            
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" required>
                    <option value="published">Published</option>
                    <option value="unpublished">Unpublished</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </div>
</div>

@endsection
