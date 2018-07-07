<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Produk;
use App\Kategori;
use Auth;
use DB;
use Carbon;

class MasterProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('admintoko');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produk = Produk::all();
        // $produk = Produk::select('id', 'nama_produk', 'kategori', 'stok', 'harga', 'foto')
                    // ->get();
        // $kategori = Kategori::get(['id_kategori', 'name']);
        // $produk = Produk::orderBy('created_at', 'desc')->get();
        // $produk = DB::table('produks')
        // ->join('kategoris', 'kategoris.id_kategori', '=', 'produks.id_kategori')
        // ->select('produks.id', 'produks.nama_produk', 'kategoris.name', 'produks.stok', 'produks.harga', 'produks.foto')
        // ->get();
        // $produk = Produk::orderBy('created_at', 'desc')->get();

        return view('admintoko.masterproduk')->with('produks', $produk);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admintoko.tambahproduk', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
         $this->validate($request, [
            'nama_produk' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'foto' => 'required',
            ]);
        if($request->hasFile('foto'))
        {          

            $foto = $request->foto->getClientOriginalName();
            $size = $request->foto->getClientSize();
            $request->foto->storeAs('public/foto/produk', $foto);
            
            $file = new Produk;
            $file->nama_produk = $request->nama_produk;
            $file->kategori = $request->kategori;
            $file->stok = $request->stok;
            $file->harga = $request->harga;
            $file->foto = $foto;
            $file->size = $size;
            $file->save();            
        }
        $request->session()->flash('alert-success', 'Produk has been created!');
        return redirect('/masterproduk');
        // return redirect()->route('masterproduk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::where('id',$id)->first();
        if(!$produk){
            abort(503);
        }
        return view('admintoko.editproduk', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_produk' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'foto' => 'required',
            ]);
        if($request->hasFile('foto'))
        {          

            $foto = $request->foto->getClientOriginalName();
            $size = $request->foto->getClientSize();
            $request->foto->storeAs('/images/produk', $foto);
            
            $file = Produk::where('id',$id)->first();;
            $file->nama_produk = $request->nama_produk;
            $file->stok = $request->stok;
            $file->harga = $request->harga;
            $file->foto = $foto;
            $file->size = $size;
            if ($request->kategori == 'Makanan') {
            $file->kategori = 'Makanan';
            }
            elseif ($request->kategori == 'Minuman') {
            $file->kategori = 'Minuman';
            }
            elseif ($request->kategori == 'Kesehatan') {
            $file->kategori = 'Kesehatan';
            }
            elseif ($request->kategori == 'Kebutuhan Rumah Tangga') {
            $file->kategori = 'Kebutuhan Rumah Tangga';
            }
            else {
            $file->kategori = 0;
            }
            $file->save();            
        }
        $request->session()->flash('alert-success', 'Produk has been updated!');
        return redirect('/masterproduk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $produks = Produk::where('id', $id);
        $produks->delete();

        $request->session()->flash('alert-danger', 'Data has been deleted!');
        return redirect('/masterproduk');
    }
}
