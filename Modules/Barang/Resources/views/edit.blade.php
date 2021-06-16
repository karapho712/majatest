@extends('layout::layouts.base')


@section('main-title', 'Edit Barang')
@section('sub-title', 'Edit Barang')

@section('button-ext')
{{-- <a href="#" class="btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i>  Tambah User</a> --}}
@endsection

@section('content')
{{-- {{dd($user)}} --}}

<div class="card-body">
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ url('barang/update/'.$data->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" placeholder="name" value="{{ $data->nama_barang }}">
            </div>
            <div class="form-group">
                <label for="title">Harga Barang</label>
                <input type="number" class="form-control" name="harga_barang" placeholder="Harga Barang" value="{{ $data->harga_barang }}">
            </div>
            <button type="submit" class="btn btn-primary btn-block">
                Simpan
            </button>
        </form>
        </div>
    </div>
</div>


@endsection