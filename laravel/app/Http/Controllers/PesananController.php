<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\Produk;
use App\Transformers\UserTransformer;


class PesananController extends Controller
{
    public function store(Request $request)
    {
        $pesanan = new Pesanan;
        $pesanan->id_user = $request->id_user;
        $pesanan->id_kurir = $request->id_kurir;
        $pesanan->id_produk = $request->id_produk;
        $pesanan->alamat_pesanan = $request->alamat_pesanan;
        $pesanan->telp_pesanan = $request->telp_pesanan;
        $pesanan->total = $request->total;
        $pesanan->status_pesanan = $request->status_pesanan;
        
        if($pesanan->save()){
            $produk = Produk::find($request->id_produk);
            //$stok_awal = $produk->stok;
            $produk->stok = $produk->stok - $request->jumlah;
            $produk->save();

            return response()->json([
                'status' => '1',
                'pesan' => 'Pesanan berhasil ditambahkan'
                ], 200);
        }
        
        return response()->json([
            'status' => '0',
            'pesan' => 'Pesanan gagal ditambahkan'
            ], 200);
    }   
}