@extends('layouts.templateadmin')

@section('title','Paket')

@section('header')
	<div class="section-header">
        <h1>Paket</h1>
    </div>
@endsection
@section('content')

<div class="row">
   <div class="col-12">
   <a href="{{ route('admin.package.create') }}" class="btn btn-primary mb-4">Tambah Baru</a>
    <div class="table-responsive">
            <table class="table table-striped" id="table-1">
            <thead>                                 
                <tr>
                <th class="text-center">
                    No
                </th>
                <th>Package Name</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Quota</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                @foreach($package as $item)                               
                @php
                    $categories = DB::table('categoris')->where('id', $item->category_id)->pluck('name')->first();
                    $subcategories = DB::table('categoris')->where('id', $item->subcategory_id)->pluck('name')->first();
                @endphp
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$categories}}</td>
                    <td>{{$subcategories}}</td>
                    <td>{{$item->quota}}</td>
                    <td>
                        @if ($item->status == 'unpublished')
                        <badge class="badge badge-warning mb-2">Unpublished</badge>
                        @elseif ($item->status == 'published')
                        <badge class="badge badge-success mb-2">Published</badge>
                        @elseif ($item->status == 'full')
                        <badge class="badge badge-danger mb-2">Full</badge>
                        @endif
                    </td>
                    <td>
                            <a href="{{route('admin.package.edit',$item->id)}}" class="btn btn-info">Edit</a>
                        <form action="{{ route('admin.package.delete', $item->id) }}" method="POST">
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