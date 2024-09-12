@extends('layouts.templateadmin')

@section('title','Berita')

@section('header')
    <div class="section-header">
        <h1>Berita</h1>
    </div>
@endsection

@section('content')

<div class="row">
   <div class="col-8 offset-2">
    <a href="{{ route('admin.berita.index') }}" class="btn btn-warning mb-4">Kembali</a>
        <form action="{{ route('admin.berita.update', $news->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Thumbnail</label>
                <input type="file" class="form-control dropify" name="image_thumbnail">
                <!-- Tampilkan gambar yang sudah ada jika ada -->
                @if($news->image_thumbnail)
                    <img src="{{ asset('assets/images/thumbnails/' . $news->image_thumbnail) }}" alt="Current Thumbnail" width="100">
                @endif
            </div>
            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" class="form-control" name="title" value="{{ $news->title }}" required>
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea name="content" id="" class="form-control summernote" required>{{ $news->content }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

@stop
