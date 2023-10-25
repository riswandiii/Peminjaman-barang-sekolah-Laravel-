<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    //function untuk menampilkan view profil
    public function index(User $user)
    {
       return view('profil.profil', [
           'title' => 'My Profil ' . $user->username,
           'user' => $user
       ]);
    }
}
