<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ManajerController extends Controller
{
    public function __construct()
    {
        $this->middleware('manajer');
    }

    public function index()
    {
        return view('manajer.index', array('manajer'=> Auth::manajer()));
    }
}
