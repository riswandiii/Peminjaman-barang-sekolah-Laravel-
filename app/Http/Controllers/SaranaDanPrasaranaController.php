<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Http\Request;

class SaranaDanPrasaranaController extends Controller
{
  
    // FUnction untuk menampilakn data sarana sesuai category
    public function category(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();
        $barang = Barang::where('category_id', $id)->get();

        if($request->search){
            return view('SaranaPrasarana.index', [
                'title' => $category->category . ' All',
                'barangs' => Barang::where('nama_barang', 'LIKE', '%' . $request->search . '%')->latest()->paginate(10),
                'categories' => Category::all()
            ]);
        }else{
            return view('SaranaPrasarana.index', [
                'title' => $category->category . ' All',
                'barangs' => $barang,
                'categories' => Category::all()
            ]);
        }
    }

    // Function untuk pecarian barang
    public function index(Request $request)
    {
        if($request->search){
            return view('SaranaPrasarana.index', [
                'title' => 'Sarana Dan Prasarana',
                'categories' => Category::all(),
                'barangs' => Barang::where('nama_barang', 'LIKE', '%' . $request->search . '%')->latest()->paginate(10)
            ]);
        }else{
            return view('SaranaPrasarana.index', [
                'title' => 'Sarana Dan Prasarana',
                'categories' => Category::all(),
                'barangs' => Barang::all()
            ]);
        }
    }

}
