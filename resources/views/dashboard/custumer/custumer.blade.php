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
                    <input type="text" class="form-control" placeholder="Masukkan username custumers!" name="search" value="{{ request('search') }}" autofocus>
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
            @if($custumers->count() > 0)
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
                            <th>Name</th>
                            <th>Username</th>
                            <th>Alamat</th>
                            <th>No. Handphone</th>
                            <th>Email</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($custumers->count() > 0)
                        
                        @foreach($custumers as $custumer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $custumer->name }}</td>
                            <td>{{ $custumer->username }}</td>
                            <td>{{ $custumer->alamat }}</td>
                            <td>{{ $custumer->no_handphone }}</td>
                            <td>{{ $custumer->email }}</td>
                            <td>
                                <a href="/custumer/{{ $custumer->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                            </td>
                        </tr>
                        @endforeach
    
                        @else 

                        <tr>
                            <td colspan="5">Custumer <strong style="font-style: italic" class="text-danger">"{{ request('search') }}"</strong> tidak tidak ada!</td>
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