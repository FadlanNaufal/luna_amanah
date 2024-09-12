@extends('layouts.templateadmin')

@section('title', 'Edit Testimoni')

@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <a href="{{ route('admin.testimoni.index') }}" class="btn btn-warning mb-4">Kembali</a>
            <form action="{{ route('admin.testimoni.update', $testimoni->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ $testimoni->name }}" required>
                </div>
                <div class="form-group">
                    <label for="package_name">Nama Paket</label>
                    <input type="text" class="form-control" name="package_name" value="{{ $testimoni->package_name }}" required>
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <select class="form-control" name="rating" required>
                        <option value="1" {{ $testimoni->rating == '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $testimoni->rating == '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $testimoni->rating == '3' ? 'selected' : '' }}>3</option>
                        <option value="4" {{ $testimoni->rating == '4' ? 'selected' : '' }}>4</option>
                        <option value="5" {{ $testimoni->rating == '5' ? 'selected' : '' }}>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Konten</label>
                    <textarea name="content" class="form-control summernote" required>{{ $testimoni->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" required>
                        <option value="published" {{ $testimoni->status == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="unpublished" {{ $testimoni->status == 'unpublished' ? 'selected' : '' }}>Unpublished</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
