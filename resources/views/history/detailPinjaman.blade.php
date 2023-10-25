@extends('layouts.main')

@section('content')

<div class="container">

    <div class="row mt-5 text-center">
        <div class="col-lg-12">
            <h3>{{ $title }}</h3>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="col-lg-10 offset-lg-1">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th>No</th>
                            <th>Sarana Prasarana</th>
                            <th>Category</th>
                            <th>Jumlah Peminjaman</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $detail)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $detail->barang->nama_barang }}</td>
                            <td>{{ $detail->barang->category->category }}</td>
                            <td>{{ $detail->jumlah }}</td>
                            <td><a href="{{ asset('storage/' . $detail->barang->image) }}" target="_blank"><img src="{{ asset('storage/' . $detail->barang->image) }}" alt="" width="70" title="{{ $detail->barang->nama_barang }}"></a></td>
                            <th><a href="/kembalikan/{{ $detail->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin kembalikan sarana prasarana?')">Kembalikan</a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-lg-10 offset-lg-1">
            <h5><strong>Total Peminjaman : </strong>{{ $total->jumlah_pinjaman }}</h5>
        </div>
    </div>

    <br><br><br><br><br><br><br><br>

</div>

@endsection