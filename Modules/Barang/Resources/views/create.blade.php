@extends('layout::layouts.base')


@section('main-title', 'Tambah Barang')
@section('sub-title', 'Tambah Barang')

@section('button-ext')
{{-- <a href="#" class="btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i>  Tambah User</a> --}}
@endsection

@section('content')
{{-- {{dd($user)}} --}}

<div class="card-body">
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ url('barang/store') }}" method="post">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="title">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" placeholder="name" value="{{ old('nama_barang') }}">
            </div>
            <div class="form-group">
                <label for="title">Harga Barang</label>
                <input type="number" class="form-control" name="harga_barang" placeholder="Harga Barang" value="{{ old('harga_barang') }}">
            </div>
            <button type="submit" class="btn btn-primary btn-block">
                Simpan
            </button>
        </form>
        </div>
    </div>
</div>


@endsection