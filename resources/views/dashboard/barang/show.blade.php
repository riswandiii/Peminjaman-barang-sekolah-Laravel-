@extends('dashboard.layouts.main')

@section('content')

<div class="container">

    <div class="row py-3">
        <div class="col-lg-12">
            <h3>{{ $title }}</h3>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <div class="card mb-3 p-5">
               <a href="{{ asset('storage/' . $barang->image) }}" target="_blank"><img src="{{ asset('storage/' . $barang->image) }}" class="img-fluid" alt="..." title="{{ $barang->nama_barang }}" data-aos="flip-left" data-aos-duration="2000"></a>
                <div class="card-body">
                  <h5 class="card-title"><strong>Nama Barang : </strong>{{ $barang->nama_barang }}</h5>
                  <p class="card-text"><strong>Stok : </strong>{{ $barang->stok }}</p>
                  <p class="card-text"><strong>Category : </strong>{{ $barang->category->category }}</p>
                </div>
              </div>
        </div>
    </div>

</div>

@endsection