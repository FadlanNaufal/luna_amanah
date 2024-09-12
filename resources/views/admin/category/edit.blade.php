@extends('layouts.templateadmin')

@section('title', 'Edit Kategori')

@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <a href="{{ route('admin.category.index') }}" class="btn btn-warning mb-4">Kembali</a>
            <form action="{{ route('admin.category.update', $category->id) }}" method="post">
                @csrf
                @method('PUT') <!-- Menggunakan method PUT untuk update -->
                
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
