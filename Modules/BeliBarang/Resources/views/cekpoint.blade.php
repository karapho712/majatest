@extends('layout::layouts.base')

@section('main-title', 'Cek Point')
@section('sub-title', 'Point Saat Ini '. $pointuser->point .' point')

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
                    <th>Minimal Point</th>
                    <th>Nama Hadiah</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($datahadiah as $item)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td>{{$item->min_point}}</td>
                    <td>{{$item->nama_hadiah}}</td>
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