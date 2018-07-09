<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\Produk;
use App\Transformers\UserTransformer;
use Illuminate\Support\Facades\DB;

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

    public function getPesanansByUser($id)
    {
        $pesanans = DB::table('pesanans')
            ->join('users as pelanggan', 'pesanans.id_user', '=', 'pelanggan.id')
            ->join('users as kurir', 'pesanans.id_kurir', '=', 'kurir.id')
            ->join('produks', 'pesanans.id_produk', '=', 'produks.id')
            ->select('pesanans.*', 'pelanggan.name as nama_pelanggan', 'kurir.name as nama_kurir', 'produks.nama_produk')
            ->orderBy('updated_at', 'desc')
            ->get();

        $json = array();
        $temp_id_pesanan = array();
        $temp_produk = array();
        $temp_total = array();
        for ($i=0; $i<count($pesanans); $i++) {
            if ($i < count($pesanans)-1) {
                if ($pesanans[$i]->updated_at == $pesanans[$i + 1]->updated_at) {
                    array_push($temp_id_pesanan, $pesanans[$i]->id_pesanan);
                    array_push($temp_produk, $pesanans[$i]->nama_produk);
                    array_push($temp_total, $pesanans[$i]->total);
                }else {
                    array_push($temp_id_pesanan, $pesanans[$i]->id_pesanan);
                    array_push($temp_produk, $pesanans[$i]->nama_produk);
                    array_push($temp_total, $pesanans[$i]->total);
                    $temp['kode_pesanan'] = strtotime($pesanans[$i]->updated_at);
                    $temp['id_user'] = $pesanans[$i]->id_user;
                    $temp['nama_pelanggan'] = $pesanans[$i]->nama_pelanggan;
                    $temp['id_kurir'] = $pesanans[$i]->id_kurir;
                    $temp['nama_kurir'] = $pesanans[$i]->nama_kurir;
                    $temp['id_pesanan'] = $temp_id_pesanan;
                    $temp['nama_produk'] = $temp_produk;
                    $temp['total'] = $temp_total;
                    $temp['status'] = $pesanans[$i]->status_pesanan;
                    $temp['created_at'] = $pesanans[$i]->created_at;
                    $temp['updated_at'] = $pesanans[$i]->updated_at;
                    array_push($json, $temp);
                    $temp_id_pesanan = array();
                    $temp_produk = array();
                    $temp_total = array();
                }
            } else {
                if ($pesanans[$i]->updated_at == $pesanans[$i - 1]->updated_at) {
                    array_push($temp_id_pesanan, $pesanans[$i]->id_pesanan);
                    array_push($temp_produk, $pesanans[$i-1]->nama_produk);
                    array_push($temp_total, $pesanans[$i-1]->total);
                    $temp['kode_pesanan'] = strtotime($pesanans[$i-1]->updated_at);
                    $temp['id_user'] = $pesanans[$i-1]->id_user;
                    $temp['nama_pelanggan'] = $pesanans[$i-1]->nama_pelanggan;
                    $temp['id_kurir'] = $pesanans[$i-1]->id_kurir;
                    $temp['nama_kurir'] = $pesanans[$i-1]->nama_kurir;
                    $temp['id_pesanan'] = $temp_id_pesanan;
                    $temp['nama_produk'] = $temp_produk;
                    $temp['total'] = $temp_total;
                    $temp['status'] = $pesanans[$i-1]->status_pesanan;
                    $temp['created_at'] = $pesanans[$i-1]->created_at;
                    $temp['updated_at'] = $pesanans[$i-1]->updated_at;

                    array_push($json, $temp);
                } else {
                    array_push($temp_id_pesanan, $pesanans[$i]->id_pesanan);
                    array_push($temp_produk, $pesanans[$i]->nama_produk);
                    array_push($temp_total, $pesanans[$i]->total);
                    $temp['kode_pesanan'] = strtotime($pesanans[$i]->updated_at);
                    $temp['id_user'] = $pesanans[$i]->id_user;
                    $temp['nama_pelanggan'] = $pesanans[$i]->nama_pelanggan;
                    $temp['id_kurir'] = $pesanans[$i]->id_kurir;
                    $temp['nama_kurir'] = $pesanans[$i]->nama_kurir;
                    $temp['id_pesanan'] = $temp_id_pesanan;
                    $temp['nama_produk'] = $temp_produk;
                    $temp['total'] = $temp_total;
                    $temp['status'] = $pesanans[$i]->status_pesanan;
                    $temp['created_at'] = $pesanans[$i]->created_at;
                    $temp['updated_at'] = $pesanans[$i]->updated_at;
                    array_push($json, $temp);
                }
            }
        }


        return response()->json(["pesanans"=>$json], 200);
    }

}