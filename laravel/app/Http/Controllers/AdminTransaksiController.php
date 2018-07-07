<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminTransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('admintransaksi');
    }

    public function index()
    {
        return view('admintransaksi.index', array('admintransaksi'=> Auth::admintransaksi()));
    }
}
