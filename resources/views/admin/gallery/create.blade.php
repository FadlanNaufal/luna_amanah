@extends('layouts.templateadmin')

@section('title','Galeri')

@section('header')
    <div class="section-header">
        <h1>Galeri</h1>
    </div>
@endsection
@section('content')

<div class="row">
<div class="col-8 offset-2">
    <a href="{{route('admin.galeri.index')}}" class="btn btn-warning mb-4">Kembali</a>
        <form action="{{route('admin.galeri.store')}}" method="post" enctype="multipart/form-data">
            
            @csrf
            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control dropify" name="image" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subcategory_id">Subcategory</label>
                <select name="subcategory_id" id="subcategory_id" class="form-control">
                    <option value="">Select Subcategory</option>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#category_id').on('change', function() {
            var categoryId = $(this).val();  // Dapatkan id kategori yang dipilih
            
            if (categoryId) {
                // Panggil AJAX untuk mendapatkan subcategories
                $.ajax({
                    url: '/get-subcategories/' + categoryId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#subcategory_id').empty(); // Kosongkan dropdown subcategory
                        $('#subcategory_id').append('<option value="">Select Subcategory</option>');
                        
                        $.each(data, function(key, value) {
                            $('#subcategory_id').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            } else {
                $('#subcategory_id').empty(); // Kosongkan jika tidak ada kategori yang dipilih
                $('#subcategory_id').append('<option value="">Select Subcategory</option>');
            }
        });
    });
</script>


@endsection
