@extends('layout::layouts.base')

@section('main-title', 'List Transaksi')
@section('sub-title', 'List Transaksi ID - '.$data->id)

@section('button-ext')
@if(Session::has('message'))
<p class="alert">{{ Session::get('message') }}</p>
@endif

@section('content')
{{-- {{dd($user)}} --}}



<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Harga</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data->details as $item)
                <tr>
                    <td>{{$item->product->nama_barang }}</td>
                    <td>{{$item->jumlah}}</td>
                    <td>{{$item->was_harga}}</td>
                    <td>{{$item->was_harga * $item->jumlah}}</td>
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