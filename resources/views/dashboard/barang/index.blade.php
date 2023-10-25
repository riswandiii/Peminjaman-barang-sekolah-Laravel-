@extends('dashboard.layouts.main')

@section('content')

<div class="container">

    <div class="row py-3">
        <div class="col-lg-12">
            <h3>{{ $title }}</h3>
        </div>
    </div>

    <div class="row mb-3">
        {{-- Form Seacrh --}}
        <div class="col-lg-6">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Sarana dan Prasarana" name="search" value="{{ request('search') }}" autofocus>
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari</button>
                  </div>
            </form>
        </div>
        {{-- End Form --}}
    </div>

    {{-- Alert --}}
   <div class="row mb-3">
    <div class="col-lg-6">
        @if(session()->has('success'))
        <div class="alert alert-primary" role="alert">
           <strong><small>{{ session('success') }}</small></strong>
          </div>
        @endif
    </div>
   </div>
    {{-- End Alert --}}

    {{-- Jika Ada pencarian --}}
    @if(request('search'))
    <div class="row mb-3">
        <div class="col-lg-12">
            @if($barangs->count() > 0)
            <p>Pencarian <strong style="font-style: italic" class="text-success">"{{ request('search') }}"</strong> ditemukan!</p>
            @else 
            <p>Pencarian <strong style="font-style: italic" class="text-danger">"{{ request('search') }}"</strong> Tidak ditemukan!</p>
            @endif
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-lg-10">
            <div class="table-responsive">
               <small>
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Sarana Prasarana</th>
                            <th>Stok</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($barangs->count() > 0)
                        
                        @foreach($barangs as $barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang->category->category }}</td>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>{{ $barang->stok }}</td>
                            <td><a href="{{ asset('storage/' . $barang->image) }}" target="_blank"><img src="{{ asset('storage/' . $barang->image) }}" width="50" title="{{ $barang->nama_barang }}"></a></td>
                            <td>
                                <a href="/sarana-prasarana/{{ $barang->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                                <a href="/sarana-prasarana/{{ $barang->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                                <form action="/sarana-prasarana/{{ $barang->id }}" method="post" class="d-inline">
                                    @csrf 
                                    @method('delete')
                                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('re you sure you want to delete data?')"><span data-feather="delete"></span></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
    
                        @else 

                        <tr>
                            <td colspan="5">Sarana atau Prasarana <strong style="font-style: italic" class="text-danger">"{{ request('search') }}"</strong> tidak tersedia!</td>
                        </tr>

                        @endif
                    </tbody>
                </table>
               </small>
            </div>
        </div>
    </div>

    <div class="row py-3">
        <div class="col-lg-12">
            <a href="/sarana-prasarana/create" class="btn btn-outline-primary btn-sm">+Create Sarna Prasarana</a>
        </div>
    </div>

</div>

@endsection