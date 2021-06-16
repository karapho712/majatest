@extends('layout::layouts.base')


@section('sub-title', 'Edit User')

@section('button-ext')
{{-- <a href="#" class="btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i>  Tambah User</a> --}}
@endsection

@section('content')
{{-- {{dd($user)}} --}}

<div class="card-body">
    <div class="card shadow">
        <div class="card-body">
            <form action="{{url('hadiah/update/'.$data->id)}}" method="post"> 
                @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">Nama Hadiah</label>
                <input type="text" class="form-control" name="nama_hadiah" placeholder="name" value="{{$data->nama_hadiah}}">
            </div>
            <div class="form-group">
                <label for="title">Minimal Point</label>
                <input type="number" class="form-control" name="min_point" placeholder="Minimal Point" value="{{$data->min_point}}">
            </div>
            <button type="submit" class="btn btn-primary btn-block">
                Simpan
            </button>
        </form>
        </div>
    </div>
</div>


@endsection