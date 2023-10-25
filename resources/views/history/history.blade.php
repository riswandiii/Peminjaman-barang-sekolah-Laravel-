@extends('layouts.main')

@section('content')

<div class="container">

    <div class="row mt-5 text-center">
        <div class="col-lg-12">
            <h3>Sarana Prasarana {{ $title }}</h3>
        </div>
    </div>

    <div class="row py-5">
        <div class="col-lg-8 offset-lg-2">
            <div class="table-responsive">
                {{-- Table data peminjaman user --}}
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-primary text-white">
                            
                            <th>Tanggal Peminjaman</th>
                            <th>Jumlan Pinjaman</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($peminjaman))
                        <tr>
                         
                            <th>{{ $peminjaman->tanggal }}</th>
                            <th>{{ $peminjaman->jumlah_pinjaman }}</th>
                            @if($peminjaman->status == '1')
                            <th>Di Pinjam</th>
                            <th><a href="/detail-peminjaman/{{ $peminjaman->id }}" class="badge bg-warning btn btn-waring border-0"><i class="bi bi-eye-fill"></i></a></th>
                            @else 
                            <th>Sudah Dikembalikan</th>
                            @endif
                        </tr>
                        @else 
                        <tr>
                            <th colspan="5" class="text-danger">Anda belum memiliki peminjaman Sarana Prasarana</th>
                        </tr>
                        @endif
                    </tbody>
                </table>
                {{-- End table --}}
            </div>
        </div>
    </div>

    {{-- alert --}}
    <div class="row justify-content-center">
        <div class="col-lg-6">
            @if(session()->has('success'))
            <small>
                <div class="alert alert-primary" role="alert">
                    <strong>{{ session('success') }}</strong>
                </div>
            </small>
            @endif
        </div>
    </div>
    {{-- End Alert --}}

    <br><br><br><br><br><br><br><br><br><br>

</div>

@endsection