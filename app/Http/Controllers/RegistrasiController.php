<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    //function untuk menampilkan view registrasi
    public function index(){
        return view('registrasi.registrasi', [
            'title' => 'Registrasi'
        ]);
    }

    // Function untuk proes registrasi
    public function registrasi(Request $request){
        $validateData = $request->validate([
            'name' => ['required', 'min:4', 'max:255'],
            'username' => ['required', 'min:5', 'max:255'],
            'alamat' => ['required', 'min:5', 'max:255'],
            'no_handphone' => ['required', 'min:5', 'max:255'],
            'email' => ['required', 'min:5', 'max:255', 'unique:users'],
            'password' => ['required', 'min:5', 'max:255']
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);
        return redirect('/login')->with('success', 'successful registration');
    }

}
