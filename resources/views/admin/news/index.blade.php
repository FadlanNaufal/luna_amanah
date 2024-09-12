@extends('layouts.templateadmin')

@section('title','Barang')

@section('header')
	<div class="section-header">
        <h1>Berita</h1>
    </div>
@endsection
@section('content')

<div class="row">
   <div class="col-12">
    <a href="{{route('admin.berita.create')}}" class="btn btn-primary mb-4">Tambah</a>
    <div class="table-responsive">
            <table class="table table-striped" id="table-1">
            <thead>                                 
                <tr>
                <th class="text-center">
                    No
                </th>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>Content</th>
                <th>Status</th>
                <th>Author</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                @foreach($news as $item)                               
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td class="py-3">
                        <img class="img-thumbnail" src="{{asset('assets/images/thumbnails/'. $item->image_thumbnail)}}" alt="" width="100">
                    </td>
                    <td>{{$item->title}}</td>
                    <td>{!!$item->content!!}</td>
                    <td>
                        @if ($item->status == 'draft')
                        <badge class="badge badge-warning mb-2">Pending</badge>
                        @elseif ($item->status == 'archive')
                        <badge class="badge badge-dark mb-2">Archive</badge>
                        @elseif ($item->status == 'published')
                        <badge class="badge badge-success mb-2">Published</badge>
                        @endif
                    </td>
                    <td>Admin</td>
                    <td>
                            <a href="{{route('admin.berita.edit',$item->id)}}" class="btn btn-info">Edit</a>
                        <form action="{{ route('admin.berita.delete', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
  </div>

@stop