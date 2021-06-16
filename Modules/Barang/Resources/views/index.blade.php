@extends('layout::layouts.base')

@section('main-title', 'Barang')
@section('sub-title', 'Barang')

@section('button-ext')
@if(Session::has('message'))
<p class="alert">{{ Session::get('message') }}</p>
@endif
<a href="{{ url('barang/create') }}" class="btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i>  Tambah Barang</a>
@endsection

@section('content')
{{-- {{dd($user)}} --}}



<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Barang</th>
                    <th>Harga Barang</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td>{{$item->nama_barang}}</td>
                    <td>{{$item->harga_barang}}</td>
                    <td>
                        <a href="{{url('barang/edit/'.$item->id)}}" class="btn btn-info">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        <form action="{{url('barang/delete/'.$item->id)}}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')

                            <button class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">
                        Data Kosong
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


@endsection