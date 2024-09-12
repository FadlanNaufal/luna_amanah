@extends('layouts.templateadmin')

@section('title','Tentang Kami')

@section('header')
	<div class="section-header">
        <h1>Tentang Kami</h1>
    </div>
@endsection
@section('content')

<div class="row">
   <div class="col-8 offset-2">
    <a href="{{route('admin.tentangkami.index')}}" class="btn btn-warning mb-4">Kembali</a>
        <form action="{{route('admin.tentangkami.store')}}" method="post" enctype="multipart/form-data">
            
            @csrf
            <div class="form-group">
                <label for="">Embed Youtube Link</label>
                <input type="text" class="form-control" name="embed_youtube_link" required>
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