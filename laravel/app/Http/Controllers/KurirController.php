<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class KurirController extends Controller
{
    public function __construct()
    {
        $this->middleware('kurir');
    }

    public function index(Request $request)
    {
        return view('kurir.index', array('kurir'=> Auth::kurir()));
    }
}
