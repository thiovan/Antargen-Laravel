<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return response()->json([
        'pesan' => 'berhasil',
        'produks' => $produks
    ], 200);
    }


    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $produk = new Produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->kategori = $request->kategori;
        $produk->stok = $request->stok;
        $produk->harga = $request->harga;
        //Harus koneksi ke internet
        $produk->foto = '';
        $produk->size = '';
        $produk->save();

        return response()->json([
            'pesan' => 'Data berhasil disimpan'
        ], 200);
    }

    
    public function show($id)
    {
        $produk = Produk::find($id);
        return response()->json([
        'pesan' => 'berhasil',
        'produk' => $produk
    ], 200);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->kategori = $request->kategori;
        $produk->stok = $request->stok;
        $produk->harga = $request->harga;
        //Harus koneksi ke internet
        $produk->foto = '';
        $produk->size = '';
        $produk->save();

        return response()->json([
            'pesan' => 'Data berhasil diubah'
        ], 200);
    }

    
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return response()->json([
            'pesan' => 'Data berhasil dihapus'
        ]);
    }

    public function makanan()
    {
        $produks = DB::table('produks')->where('kategori', 'makanan')->select('nama_produk', 'kategori', 'stok', 'harga', 'id', 'foto')->limit(10)->get();
        return response()->json([
            'pesan' => 'Data Makanan',
            'produks' => $produks], 200);
    }

    public function minuman()
    {
        $produks = DB::table('produks')->where('kategori', 'minuman')->select('nama_produk', 'kategori', 'stok', 'harga', 'id', 'foto')->limit(10)->get();
        return response()->json([
            'pesan' => 'Data Minuman',
            'produks' => $produks], 200);
    }

    public function kesehatan()
    {
        $produks = DB::table('produks')->where('kategori', 'kesehatan')->select('nama_produk', 'kategori', 'stok', 'harga', 'id', 'foto')->limit(10)->get();
        return response()->json([
            'pesan' => 'Data Produk Kesehatan',
            'produks' => $produks], 200);
    }

    public function krt()
    {
        $produks = DB::table('produks')->where('kategori', 'kebutuhan rumah tangga')->select('nama_produk', 'kategori', 'stok', 'harga', 'id', 'foto')->limit(10)->get();
        return response()->json([
            'pesan' => 'Data Kebutuhan Rumah Tangga',
            'produks' => $produks], 200);
    }
}
