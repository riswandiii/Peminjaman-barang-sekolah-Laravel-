<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Barang $barang)
    {
        //untuk menampilkan view pinjam.blade.php
        return view('peminjaman.pinjam', [
            'title' => $barang->nama_barang,
            'barang' => $barang
        ]);
    }

    public function peminjaman(Request $request, Barang $barang)
    {
        $tanggal = Carbon::now();

        // Cek jika jumlah pinjaman lebih besar dari stok u
        if($request['jumlahPinjaman'] > $barang->stok){
            return redirect('/peminjaman/' . $barang->id)->with('success', 'stock not available');
        }

        // Update stok barang
        $stokBarang = [
            'stok' => $barang->stok - $request->jumlahPinjaman
        ];
        Barang::where('id', $barang->id)->update($stokBarang);

        // Cek jika user id sudah ada dalam tabel peminajamn ntuk table peminjaman
        $cekUser = Peminjaman::where('user_id', auth()->user()->id)->first();
        if(empty($cekUser)){
            // Proses tambah ke tabel peminjaman
            $peminjamanInsert = [
                'user_id' => auth()->user()->id,
                'tanggal' => date($tanggal),
                'jumlah_pinjaman' => $request->jumlahPinjaman,
                'status' => '1'
            ];
        Peminjaman::create($peminjamanInsert);
        }else{
            // Proses update tabel peminjaman
            $peminjamanUpdate = [
                'tanggal' => date($tanggal),
                'jumlah_pinjaman' => $cekUser->jumlah_pinjaman + $request->jumlahPinjaman,
                'status' => '1'
            ];
        Peminjaman::where('id', $cekUser->id)->update($peminjamanUpdate);
        }


        // Cek jika user id sudah ada dalam tabel peminajamn ntuk table peminjamanDEtail
        $cekUser = Peminjaman::where('user_id', auth()->user()->id)->first();
        $peminjamanDetail = PeminjamanDetail::where('barang_id', $barang->id)->where('peminjaman_id', $cekUser->id)->first();
        if(empty($peminjamanDetail)){
            // proses tamabh ke tabel peminjaman detail
            $peminajamanDetailInsert = [
                'peminjaman_id' => $cekUser->id,
                'barang_id' => $barang->id,
                'jumlah' => $request->jumlahPinjaman
            ];
            PeminjamanDetail::create($peminajamanDetailInsert);
        }else{
            $peminjamanDetailUpdate = [
                'jumlah' => $peminjamanDetail->jumlah + $request->jumlahPinjaman
            ];
            PeminjamanDetail::where('id', $peminjamanDetail->id)->update($peminjamanDetailUpdate);
        }
        return redirect('/history/' . auth()->user()->id)->with('success', 'the borrowing of infrastructure facilities has been successfully borrowed');

    }

    

    // Function untuk proses pengembalian sarana prasarna
    public function kembalikan($id)
    {
        $detail = PeminjamanDetail::where('id', $id)->first();
        $barang = Barang::where('id', $detail->barang_id)->first();
        $peminjaman = Peminjaman::where('id', $detail->peminjaman_id)->first();
        
        // update stok barang
        $stokBarang = [
            'stok' => $barang->stok + $detail->jumlah
        ];
        Barang::where('id', $barang->id)->update($stokBarang);

        // update kolm jumlah pinjaman di tabel peminjaman
        $jumlahPinjaman = [
            'jumlah_pinjaman' => $peminjaman->jumlah_pinjaman - $detail->jumlah
        ];
        Peminjaman::where('id', $peminjaman->id)->update($jumlahPinjaman);

        // Proses hapus data pinjaman detail
        PeminjamanDetail::destroy('id', $id);
        return redirect('/history/' . auth()->user()->id)->with('success', 'loan successfully returned');
    }

    // Function untuk proses melihat detail peminjaman
    public function detailPeminjaman($id)
    {
        return view('history.detailPinjaman', [
            'title' => 'Detail Peminjaman ' . auth()->user()->username,
            'total' => Peminjaman::where('id', $id)->first(),
            'details' => PeminjamanDetail::where('peminjaman_id',$id)->get()
        ]);
    }


}
