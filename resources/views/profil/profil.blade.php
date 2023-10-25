@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="container">
        <br>
        <div class="row py-5">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12">
               <div class="card p-3">
                <div class="card-header">
                    <h3><i class="bi bi-person-lines-fill"></i> {{ $title }}</h3>
                </div>
                <div class="card-body">
                   <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $user->alamat }}</td>
                            </tr>
                            <tr>
                                <td>No. Handphone</td>
                                <td>:</td>
                                <td>{{ $user->no_handphone }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                   </div>
                </div>
               </div>
            </div>
        </div>

    </div>
</div>
<br><br><br>

@endsection