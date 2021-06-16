@extends('layout::layouts.base')

@section('main-title', 'List Transaksi')
@section('sub-title', 'List Transaksi')

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
                    <th>Nomor</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->total}}</td>
                    <td>
                        <a href="{{url('transaksi/show/'.$item->id)}}" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                        {{-- <form action="{{url('barang/delete/'.$item->id)}}" method="POST" class="d-inline">
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