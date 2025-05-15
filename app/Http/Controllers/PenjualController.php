<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualController extends Controller
{
   public function lhtProduk()
   {
    $produk = Produk::all();
    return view('penjual.lihatProduk', compact('produk'));
   }

   public function lhttambah(){
    return view('penjual.uploadProduk');
   }

   public function tambahProduk(Request $request){
    //dd($request);
    $request->validate([
        'nama_produk'=>'required|string',
        'deskripsi'=>'required|string',
        'stok'=>'required|numeric|min:0',
        'harga'=>'required|numeric|min:0',
        'foto_produk'=>'required|image|mimes:jpeg,png,jpg|max:20048',
    ]);

    $data=new Produk();
    $data->id_user=Auth::user()->id;
    $data->nama_produk=$request->nama_produk;
    $data->deskripsi=$request->deskripsi;
    $data->stok=$request->stok;
    $data->harga=$request->harga;
    $data->foto_produk=$request->foto_produk;

    if ($request->hasFile('foto_produk')) {
        $data->foto_produk=$request->file('foto_produk')->store('gambar_produk','public');
    }
    $data->save();
    return redirect()->route('lhtProduk')->with('success', 'Produk berhasil di tambah');
   }

   public function editproduk(Request $request){
    $produk = Produk::findOrFail($request->id);
    if($request->isMethod('post')){
        $request->validate([
            'nama_produk'=>'required|string',
            'deskripsi'=>'required|string',
            'stok'=>'required|numeric|min:0',
            'harga'=>'required|numeric|min:0',
            'foto_produk'=>'image|mimes:jpeg,png,jpg|max:20048',
        ]);

        $produk->nama_produk=$request->nama_produk;
        $produk->deskripsi=$request->deskripsi;
        $produk->stok=$request->stok;
        $produk->harga=$request->harga;

        if ($request->hasFile('foto_produk')) {
            $produk->foto_produk=$request->file('foto_produk')->store('gambar_produk','public');
        }
        $produk->save();
        return redirect()->route('lhtProduk')->with('success', 'Produk berhasil di edit');
    }
    return view('penjual.editProduk', compact('produk'));
   }

   public function hapusproduk($id){
    $produk = Produk::findOrFail($id);
    $produk->delete();
    return redirect()->route('lhtProduk')->with('success', 'Produk berhasil di hapus');
   }

   
}
