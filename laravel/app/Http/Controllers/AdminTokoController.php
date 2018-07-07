<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminTokoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admintoko');
    }

    public function index()
    {
        return view('admintoko.index', array('admintoko'=> Auth::admintoko()));
    }
}
