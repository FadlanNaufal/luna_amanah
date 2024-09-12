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
   <a href="{{ route('admin.subcategory.create') }}" class="btn btn-primary mb-4">Tambah Baru</a>
    <div class="table-responsive">
            <table class="table table-striped" id="table-1">
            <thead>                                 
                <tr>
                <th class="text-center">
                    No
                </th>
                <th>Name</th>
                <th>Category Name</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                @foreach($subcategory as $item)                               
                @php
                    $categories = DB::table('categoris')->where('id', $item->category_id)->pluck('name')->first();
                @endphp
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$categories}}</td>
                    <td>
                            <a href="{{route('admin.subcategory.edit',$item->id)}}" class="btn btn-info">Edit</a>
                        <form action="{{ route('admin.subcategory.delete', $item->id) }}" method="POST">
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