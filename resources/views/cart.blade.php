@extends('layout::layouts.base')

@section('main-title', 'Cart')
@section('sub-title', 'Cart')

@section('button-ext')
@if(Session::has('message'))
<p class="alert">{{ Session::get('message') }}</p>
@endif

@endsection

@section('content')
{{-- {{dd($user)}} --}}



<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Jumlah</th>
                    <th>Sub Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (empty($cart)||count($cart) == 0)
                <tr>
                    <td colspan="4">Tidak ada Product</td>
                </tr>
                @else
                @php
                $grandtotal = 0
                @endphp
                @foreach ($cart as $item=>$val)
                @php
                $subtotal = $val["harga_barang"] * $val["jumlah"];
                @endphp
                <tr>
                    <td>
                        {{$loop->iteration }}
                    </td>
                    <td>
                        {{$val['nama_barang'] }}
                    </td>
                    <td>
                        {{$val['harga_barang'] }}
                    </td>
                    <td>
                        {{$val['jumlah'] }}
                    </td>
                    <td>
                        {{$subtotal }}
                    </td>
                    <td>
                        <a href="{{url('cart/hapus/'.$item)}}" class="btn btn-info">
                            <i class="fa fa-minus"></i>
                        </a>
                    </td>

                    @php
                    $grandtotal += $subtotal;
                    @endphp
                </tr>
                @endforeach
                <tr>
                    <th colspan="5">Total :</th>
                    <th>{{$grandtotal}} 
                        <a href="{{url('cart/bayar')}}" class="btn btn-info">
                            Bayar
                        </a>
                    </th>
                </tr>
                @endif
            </tbody>
            {{-- <tbody>
                @forelse ($data as $item)
                <tr>
                    <td>{{$loop->iteration }}</td>
            <td>{{$item->nama_barang}}</td>
            <td>{{$item->harga_barang}}</td>
            <td>
                <a href="{{url('cart/tambah/'.$item->id)}}" class="btn btn-info">
                    <i class="fa fa-plus"></i>
                </a>
            </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">
                    Data Kosong
                </td>
            </tr>
            @endforelse
            </tbody> --}}
        </table>
    </div>
</div>


@endsection