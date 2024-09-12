@extends('layouts.templateadmin')

@section('title', 'Edit Subcategory')

@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <a href="{{ route('admin.subcategory.index') }}" class="btn btn-warning mb-4">Kembali</a>
            <form action="{{ route('admin.subcategory.update', $subcategory->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama Subcategory</label>
                    <input type="text" class="form-control" name="name" value="{{ $subcategory->name }}" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
