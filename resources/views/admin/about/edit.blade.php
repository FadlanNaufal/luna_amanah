@extends('layouts.templateadmin')

@section('title', 'Edit Tentang Kami')

@section('header')
    <div class="section-header">
        <h1>Edit Tentang Kami</h1>
    </div>
@endsection

@section('content')

<div class="row">
    <div class="col-8 offset-2">
        <a href="{{ route('admin.tentangkami.index') }}" class="btn btn-warning mb-4">Kembali</a>
        <form action="{{ route('admin.tentangkami.update', $tentangKami->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="embed_youtube_link">Embed YouTube Link</label>
                <input type="text" class="form-control" name="embed_youtube_link" value="{{ old('embed_youtube_link', $tentangKami->embed_youtube_link) }}" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control summernote" required>{{ old('content', $tentangKami->content) }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="" class="form-control">
                    @if($tentangKami->status == 'unpublished')
                        <option value="unpublished" selected>Unpublished</option>
                        <option value="published">Published</option>
                    @elseif($tentangKami->status == 'published')
                        <option value="unpublished">Unpublished</option>
                        <option value="published" selected>Published</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection
