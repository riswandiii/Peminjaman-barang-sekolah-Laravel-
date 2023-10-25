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
                    <input type="text" class="form-control" placeholder="Pencarian sesuai tanggal!" name="search" value="{{ request('search') }}" autofocus>
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
            @if($peminjamans->count() > 0)
            <p>Pencarian pada <strong style="font-style: italic" class="text-success">"{{ request('search') }}"</strong> ditemukan!</p>
            @else 
            <p>Pencarian pada <strong style="font-style: italic" class="text-danger">"{{ request('search') }}"</strong> Tidak ditemukan!</p>
            @endif
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="table-responsive">
               <small>
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Peminjam</th>
                            <th>Tanggal</th>
                            <th>Jumlah Pinjaman</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($peminjamans->count() > 0)
                        
                        @foreach($peminjamans as $peminjam)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $peminjam->user->username }}</td>
                            <td>{{ $peminjam->tanggal }}</td>
                            <td>{{ $peminjam->jumlah_pinjaman }}</td>
                            <td>
                                <a href="/data-peminjaman/{{ $peminjam->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                            </td>
                        </tr>
                        @endforeach
    
                        @else 

                        <tr>
                            <td colspan="5">Data Peminjaman pada <strong style="font-style: italic" class="text-danger">"{{ request('search') }}"</strong> tidak ada!</td>
                        </tr>

                        @endif
                    </tbody>
                </table>
               </small>
            </div>
        </div>
    </div>

</div>

@endsection