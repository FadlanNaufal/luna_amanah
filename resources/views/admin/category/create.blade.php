@extends('layouts.templateadmin')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <a href="{{ route('admin.category.index') }}" class="btn btn-warning mb-4">Kembali</a>
            <form action="{{ route('admin.category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
