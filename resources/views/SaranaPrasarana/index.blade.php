@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="container">

        <div class="row mt-3 py-3">
            <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-12">
                {{-- Form Search --}}
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Sarana / Prasarana" name="search" value="{{ request('search') }}" autofocus>
                        <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari</button>
                      </div>
                </form>
                {{-- End Form --}}
            </div>
        </div>

        {{-- Jika ada pencarian --}}
        @if(request('search'))
        <div class="row mb-3 text-center mb-3">
        <div class="col-lg-12">
           @if($barangs->count() > 0)
           <p class="text-success">Pencarian Sarana atau Prasarana <strong style="font-style: italic">"{{ request('search') }}"</strong> ditemukan!</p>
           @else 
           <p class="text-danger">Pencarian Sarana atau Prasarana <strong style="font-style: italic">"{{ request('search') }}"</strong> tidak ditemukan!</p>
           @endif
        </div>
        </div>
        @endif
        {{-- End pencarian --}}

        <div class="row mb-3 text-center text-white gx-1">
            @foreach($categories as $category)
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
               <a href="/category/{{ $category->id }}" class="text-decoration-none text-white">
                <div class="card bg-primary p-4">
                    <h3>{{ $category->category }}</h3>
                </div>
               </a>
            </div>
            @endforeach
        </div>

        <div class="row text-center mb-3">
            <div class="col-lg-12">
                <h3>{{ $title }}</h3>
            </div>
        </div>

        {{-- Sarana dan prasana --}}
            @if($barangs->count() > 0)

            <div class="row mb-3 gx-1">
                @foreach($barangs as $barang)
                <div class="col-lg-4 mb-2">
                    <div class="card p-3">
                       <a href="{{ asset('storage/' . $barang->image) }}" target="_blank"><img src="{{ asset('storage/' . $barang->image) }}" class="card-img-top img-fluid" alt="..." title="{{ $barang->nama_barang }}" data-aos="flip-left" data-aos-duration="2000"></a>
                        <div class="card-body">
                          <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                          <p class="card-text"><strong>Stok : </strong>{{ $barang->stok }}</p>
                          <p class="card-text"><strong>Category : </strong>{{ $barang->category->category }}</p>
                          <a href="/peminjaman/{{ $barang->id }}" class="btn btn-primary btn-sm">Pinjam</a>
                        </div>
                      </div>
                </div>
                @endforeach
            </div>

            @else 
            
            <div class="row text-center text-danger">
                <div class="row mb-3">
                    <h4>Sarana / Prasarana <strong style="font-style: italic">"{{ request('search') }}"</strong> Tidak Ada!</h4>
                </div>
            </div>

            @endif
        
        {{-- End sarana dan prasarana --}}

    </div>
</div>

@endsection