@extends('layouts.templateadmin')

@section('title','Logo Sertifikasi')

@section('header')
	<div class="section-header">
        <h1>Logo Sertifikasi</h1>
    </div>
@endsection
@section('content')

<div class="row">
   <div class="col-12">
   <a href="{{ route('admin.certificate-logo.create') }}" class="btn btn-primary mb-4">Tambah Baru</a>
    <div class="table-responsive">
            <table class="table table-striped" id="table-1">
            <thead>                                 
                <tr>
                <th class="text-center">
                    No
                </th>
                <th>Name</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                @foreach($logos as $item)                               
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>
                        <img class="img-thumbnail" src="{{asset('assets/images/logos/'. $item->image)}}" alt="" width="100">
                    </td>    
                    <td>{{$item->name}}</td>
                    <td>
                        @if ($item->status == 'unpublished')
                        <badge class="badge badge-warning mb-2">Unpublished</badge>
                        @elseif ($item->status == 'published')
                        <badge class="badge badge-success mb-2">Published</badge>
                        @endif
                    </td>
                    <td>
                            <a href="{{route('admin.certificate-logo.edit',$item->id)}}" class="btn btn-info">Edit</a>
                        <form action="{{ route('admin.certificate-logo.delete', $item->id) }}" method="POST">
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