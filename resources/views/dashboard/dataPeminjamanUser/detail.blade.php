@extends('dashboard.layouts.main')

@section('content')

<div class="container">

    <div class="row mt-3">
        <div class="col-lg-12">
            <h3>{{ $title }}</h3>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="col-lg-8">
            <div class="table-responsive">
                <small>
                  <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Sarana Prasarana</th>
                            <th>Category</th>
                            <th>Jumlah Peminjaman</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $detail)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $detail->barang->nama_barang }}</td>
                            <td>{{ $detail->barang->category->category }}</td>
                            <td>{{ $detail->jumlah }}</td>
                            <td><a href="{{ asset('storage/' . $detail->barang->image) }}" target="_blank"><img src="{{ asset('storage/' . $detail->barang->image) }}" alt="" width="50" title="{{ $detail->barang->nama_barang }}"></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               </small>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-lg-12">
            <h5><strong>Total Peminjaman : </strong>{{ $total }}</h5>
        </div>
    </div>

</div>

@endsection