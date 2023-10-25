@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <div class="cotainer">
        <br>
        <div class="row mt-5 text-center mb-5">
            {{-- Alert --}}
            <div class="col-lg-4 offset-lg-4 mb-3">
                @if(session()->has('success'))
                <div class="alert alert-primary" role="alert">
                    <strong><small>{{ session('success') }}</small></strong>
                  </div>
                @endif
            </div>
            {{-- Edn alert --}}
            <div class="col-lg-4 offset-lg-4">
                <h3><img src="img/logo.png" width="50" alt="" data-aos="flip-left" data-aos-duration="2000"> Please {{ $title }}</h3>
            </div>
            <div class="col-lg-4 offset-lg-4 col-10 offset-1 mt-3">
                 {{-- Form Login --}} 
                <div>
                    <form action="/login" method="post">
                        @csrf 

                        <div class="mb-1">
                            <input type="text" id="username" name="username" placeholder="Username..." value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" >
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-1">
                            <input type="password" id="password" name="password" placeholder="Password..." value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" >
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-2 text-start">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                  <small>Show in password<small>
                                </label>
                              </div>
                        </div>

                        <div class="mb-4">
                            <button class="btn btn-outline-primary w-100" type="submit">LOGIN</button>
                        </div>

                        <div>
                            <p><small>don't have an account yet? <a href="registrasi" class="text-decoration-none">register now</a></small></p>
                        </div>

                    </form>
                </div>
            {{-- End Form --}}
            </div>
        </div>

    </div>
</div>
<br><br><br>

@endsection