@extends('layouts.templateadmin')

@section('title','Kategori')

@section('header')
	<div class="section-header">
        <h1>Kategori</h1>
    </div>
@endsection
@section('content')

<div class="row">
   <div class="col-12">
   <a href="{{ route('admin.category.create') }}" class="btn btn-primary mb-4">Tambah Baru</a>
    <div class="table-responsive">
            <table class="table table-striped" id="table-1">
            <thead>                                 
                <tr>
                <th class="text-center">
                    No
                </th>
                <th>Name</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                @foreach($category as $item)                               
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                            <a href="{{route('admin.category.edit',$item->id)}}" class="btn btn-info">Edit</a>
                        <form action="{{ route('admin.category.delete', $item->id) }}" method="POST">
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