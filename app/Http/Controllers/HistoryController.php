<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Peminjaman;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    //function untuk menampilkan view history prminjaman user
    public function index(User $user){
        
        return view('history.history', [
            'title' => 'Peminjaman ' . $user->username,
            'peminjaman' => Peminjaman::where('user_id', $user->id)->first()
        ]);
    }
}
