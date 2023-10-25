<?php

namespace App\Http\Controllers;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use App\Models\User;
use Illuminate\Http\Request;

class DataPeminjamanController extends Controller
{
    //function untuk menampilkan view data peminjaman
    public function index(Request $request)
    {
       if($request->search){
            return view('dashboard.dataPeminjamanUser.index', [
                'title' => 'Data Peminjaman All',
                'peminjamans' => Peminjaman::where('tanggal', 'LIKE', '%' . $request->search . '%')->latest()->paginate(10)
            ]);
       }else{
            return view('dashboard.dataPeminjamanUser.index', [
                'title' => 'Data Peminjaman All',
                'peminjamans' => Peminjaman::all()
            ]);
       }
    }


    // function untuk menampilkan detail peminjaman user
    public function detail($id)
    {
        $peminjaman = Peminjaman::where('id', $id)->first();

        return view('dashboard.dataPeminjamanUser.detail', [
            'title' => 'Data Detail Peminjaman ' . $peminjaman->user->username,
            'details' => PeminjamanDetail::where('peminjaman_id', $id)->get(),
            'total' => $peminjaman->jumlah_pinjaman
        ]);
    }

}
