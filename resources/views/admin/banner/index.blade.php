@extends('layouts.templateadmin')

@section('title','Banner')

@section('header')
	<div class="section-header">
        <h1>Banner</h1>
    </div>
@endsection
@section('content')

<div class="row">
   <div class="col-12">
   <a href="{{ route('admin.banner.create') }}" class="btn btn-primary mb-4">Tambah Baru</a>
    <div class="table-responsive">
            <table class="table table-striped" id="table-1">
            <thead>                                 
                <tr>
                <th class="text-center">
                    No
                </th>
                <th>Image</th>
                <th>Menu Location</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                @foreach($banner as $item)                               
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>
                        <img class="img-thumbnail" src="{{asset('assets/images/banner/'. $item->image)}}" alt="" width="100">
                    </td>    
                    <td>
                        @if($item->menu_location == 'home')
                            Menu Home
                        @elseif($item->menu_location == 'tentang_kami')
                            Menu Tentang Kami
                        @elseif($item->menu_location == 'paket')
                            Menu Paket
                        @elseif($item->menu_location == 'galeri')
                            Menu Galeri
                        @endif
                    </td>
                    <td>
                        @if ($item->status == 'unpublished')
                        <badge class="badge badge-warning mb-2">Unpublished</badge>
                        @elseif ($item->status == 'published')
                        <badge class="badge badge-success mb-2">Published</badge>
                        @endif
                    </td>
                    <td>
                            <a href="{{route('admin.banner.edit',$item->id)}}" class="btn btn-info">Edit</a>
                        <form action="{{ route('admin.banner.delete', $item->id) }}" method="POST">
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