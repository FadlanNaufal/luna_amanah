@extends('layouts.templateadmin')

@section('title','Galeri')

@section('header')
	<div class="section-header">
        <h1>Galeri</h1>
    </div>
@endsection
@section('content')

<div class="row">
   <div class="col-12">
   <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary mb-4">Tambah Baru</a>
    <div class="table-responsive">
            <table class="table table-striped" id="table-1">
            <thead>                                 
                <tr>
                <th class="text-center">
                    No
                </th>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Kategori</th>
                <th>Sub Kategori</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                @foreach($gallery as $item)                               
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$item->title}}</td>
                    <td class="py-3">
                        <img class="img-thumbnail" src="{{asset('assets/images/galeri/'. $item->image)}}" alt="" width="100">
                    </td>
                    @php
                        $categories = DB::table('categoris')->where('id', $item->category_id)->pluck('name')->first();
                        $subcategories = DB::table('subcategories')->where('id', $item->subcategory_id)->pluck('name')->first();
                    @endphp
                    <td>{{$categories}}</td>
                    <td>{{$subcategories}}</td>
                    <td>
                        @if ($item->status == 'unpublished')
                        <badge class="badge badge-warning mb-2">Unpublished</badge>
                        @elseif ($item->status == 'published')
                        <badge class="badge badge-success mb-2">Published</badge>
                        @endif
                    </td>
                    <td>
                            <a href="{{route('admin.galeri.edit',$item->id)}}" class="btn btn-info">Edit</a>
                        <form action="{{ route('admin.galeri.delete', $item->id) }}" method="POST">
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