@extends('layout::layouts.base')

@section('main-title', 'Hadiah')
@section('sub-title', 'Hadiah')

@section('button-ext')
@if(Session::has('message'))
<p class="alert">{{ Session::get('message') }}</p>
@endif
<a href="{{ url('hadiah/create') }}" class="btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i>  Tambah Hadiah</a>
@endsection

@section('content')
{{-- {{dd($user)}} --}}



<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Minimal Point</th>
                    <th>Hadiah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td>{{$item->min_point}}</td>
                    <td>{{$item->nama_hadiah}}</td>
                    <td>
                        <a href="{{url('hadiah/edit/'.$item->id)}}" class="btn btn-info">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        <form action="{{url('hadiah/delete/'.$item->id)}}" method="POST" class="d-inline">
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