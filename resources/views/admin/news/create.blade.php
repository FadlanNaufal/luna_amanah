@extends('layouts.templateadmin')

@section('title','Barang')

@section('header')
	<div class="section-header">
        <h1>Berita</h1>
    </div>
@endsection
@section('content')

<div class="row">
   <div class="col-8 offset-2">
    <a href="{{route('admin.berita.index')}}" class="btn btn-warning mb-4">Kembali</a>
        <form action="{{route('admin.berita.store')}}" method="post" enctype="multipart/form-data">
            
            @csrf
            <div class="form-group">
                <label for="">Thumbnail</label>
                <input type="file" class="form-control dropify" name="image_thumbnail" required>
            </div>
            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea name="content" id="" class="form-control summernote" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
  </div>

@stop