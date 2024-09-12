@extends('layouts.templateadmin')

@section('title','Tentang Kami')

@section('header')
	<div class="section-header">
        <h1>Tentang Kami</h1>
    </div>
@endsection
@section('content')

<div class="row">
   <div class="col-12">
        @if($dataCount === 0)
            <a href="{{ route('admin.tentangkami.create') }}" class="btn btn-primary mb-4">Tambah Baru</a>
        @endif
    <div class="table-responsive">
            <table class="table table-striped" id="table-1">
            <thead>                                 
                <tr>
                <th class="text-center">
                    No
                </th>
                <th>Video Embed Youtube</th>
                <th>Content</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody> 
                @foreach($about as $item)                               
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$item->embed_youtube_link}}</td>
                    <td>{!!$item->content!!}</td>
                    <td>
                        @if ($item->status == 'unpublished')
                        <badge class="badge badge-warning mb-2">Unpublished</badge>
                        @elseif ($item->status == 'published')
                        <badge class="badge badge-success mb-2">Published</badge>
                        @endif
                    </td>
                    <td>
                            <a href="{{route('admin.tentangkami.edit',$item->id)}}" class="btn btn-info">Edit</a>
                        <form action="{{ route('admin.tentangkami.delete', $item->id) }}" method="POST">
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