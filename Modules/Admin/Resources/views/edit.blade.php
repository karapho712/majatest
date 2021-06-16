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
            <form action="{{url('admin/user/update/'.$data->id)}}" method="post"> 
                @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" name="name" placeholder="name" value="{{$data->name}}">
            </div>
            <div class="form-group">
                <label for="location">Email Address</label>
                <input type="text" class="form-control" name="email" placeholder="email" value="{{$data->email}}">
            </div>
            <div class="form-group">
                <label for="about">Password</label>
                <input type="password" class="form-control" name="password" placeholder="password" value="">
            </div>
            <div class="form-group">
                <label for="featured_event">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="password_confirmation" value="">
            </div>
            <button type="submit" class="btn btn-primary btn-block">
                Simpan
            </button>
        </form>
        </div>
    </div>
</div>


@endsection