@extends('layout::layouts.base')

@section('main-title', 'Beli Barang')
@section('sub-title', 'Beli Barang')

@section('button-ext')
@if(Session::has('message'))
<p class="alert">{{ Session::get('message') }}</p>
@endif

@endsection

@section('content')
{{-- {{dd($user)}} --}}



<div class="card-body">
    <div class="table-responsive">
        <a href="{{url('belibarang/cekpoint')}}" class="font-weight-bold">Cek point Saya</a>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Barang</th>
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
                        <a href="{{url('cart/tambah/'.$item->id)}}" class="btn btn-info">
                            <i class="fa fa-plus"></i>
                        </a>
                        {{-- <form action="{{url('cart/delete/'.$item->id)}}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')

                            <button class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form> --}}
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