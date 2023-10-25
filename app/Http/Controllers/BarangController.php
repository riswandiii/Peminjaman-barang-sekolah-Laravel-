<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search){
            return view('dashboard.barang.index', [
                'title' => 'Sarana dan Prasarana',
                'barangs' => Barang::where('nama_barang', 'LIKE', '%' . $request->search . '%')->latest()->paginate(10) 
            ]);
        }else{
            return view('dashboard.barang.index', [
                'title' => 'Sarana dan Prasarana',
                'barangs' => Barang::latest()->paginate(10)
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     // Function untuk menampilan view tambah data saran dan praarna
     public function create()
     {
         return view('dashboard.barang.tambah', [
             'title' => 'Create Sarana Prasarana',
             'categories' => Category::all(),
         ]);
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
 
     //  Function untuk proses create data
     public function store(Request $request)
     {
         //proses tambah data barang
         $validasiData = $request->validate([
             'category_id' => ['required'],
             'nama_barang' => ['required', 'min:5','max:255'],
             'stok' => ['required'],
             'image' => 'image|file|max:1024',
         ]);
 
        if($request->file('image')){
            $validasiData['image'] = $request->file('image')->store('post-image');
        }
 
        Barang::create($validasiData);
        return redirect('/sarana-prasarana')->with('success', 'infrastructure data has been successfully added');
        
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang, $id)
    {
        //proses menampilkan detail barang
        $barang = Barang::where('id', $id)->first();
        return view('dashboard.barang.show', [
            'title' => 'Detail ' . $barang->nama_barang,
            'barang' => $barang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang, $id)
    {
        $barang = Barang::where('id', $id)->first();
        return view('dashboard.barang.edit', [
            'title' => 'Edit Sarana Prasarana',
            'barang' => $barang,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang, $id)
    {
        //untuk proses update
        $barang = Barang::where('id', $id)->first();
        $rules = [
             'category_id' => ['required'],
             'nama_barang' => ['required', 'min:5','max:255'],
             'stok' => ['required'],
             'image' => 'image|file|max:1024',
        ];

        $validasiData = $request->validate($rules);
        if($request->file('image')){
            if($request->gambarLama){
                Storage::delete($request->gambarLama);
            }
            $validasiData['image'] = $request->file('image')->store('post-image');
        }
        Barang::where('id', $barang->id)->update($validasiData);
        return redirect('/sarana-prasarana')->with('success', 'infrastructure has been successfully changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang, $id)
    {
        //proses hapusa data
        $barang = Barang::where('id', $id)->first();
        if($barang->image){
            Storage::delete($barang->image);
        }
        Barang::destroy('id', $barang->id);
        return redirect('/sarana-prasarana')->with('success', 'data deleted successfully');
    }
}
