<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class MasterUserController extends Controller
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
    public function index()
    {
        $users = User::all();
        return view('admintoko.masteruser', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admintoko.tambahuser', compact('users'));
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
            'name' => 'required|max:30|unique:users,name',
            'email' => 'required',
            'password' => 'required|min:6|confirmed',
            'status' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->status == 'Admin Toko') {
            $user->admintoko = 1;
            $user->admintransaksi = 0;
            $user->manajer = 0;
            $user->kurir = 0;
            $user->pelanggan = 0;
        }
        elseif ($request->status == 'Admin Transaksi') {
            $user->admintoko = 0;
            $user->admintransaksi = 1;
            $user->manajer = 0;
            $user->kurir = 0;
            $user->pelanggan = 0;
        }
        elseif ($request->status == 'Manajer') {
            $user->admintoko = 0;
            $user->admintransaksi = 0;
            $user->manajer = 1;
            $user->kurir = 0;
            $user->pelanggan = 0;
        }
        elseif ($request->status == 'Kurir') {
            $user->admintoko = 0;
            $user->admintransaksi = 0;
            $user->manajer = 0;
            $user->kurir = 1;
            $user->pelanggan = 0;
        }
        elseif ($request->status == 'Pelanggan') {
            $user->admintoko = 0;
            $user->admintransaksi = 0;
            $user->manajer = 0;
            $user->kurir = 0;
            $user->pelanggan = 1;
        }
        else {
            $user->admin = 0;
            $user->peternak = 0;
            $user->pks = 0;
            $user->user = 0; 
        }
        $user->password=bcrypt($request->password);
        $user->save();
        
        $request->session()->flash('alert-success', 'User has been created!');
        return redirect('/masteruser');
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
        $user = User::where('id',$id)->first();
        if(!$user){
            abort(503);
        }
        return view('admintoko.edituser', compact('user'));
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
        $user = User::where('id',$id)->first();

        $this->validate($request, [
            'name' => 'required|max:30|unique:users,name',
            'email' => 'required',
            'password' => 'required|min:6|confirmed',
            'status' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->status == 'Admin Toko') {
            $user->admintoko = 1;
            $user->admintransaksi = 0;
            $user->manajer = 0;
            $user->kurir = 0;
            $user->pelanggan = 0;
        }
        elseif ($request->status == 'Admin Transaksi') {
            $user->admintoko = 0;
            $user->admintransaksi = 1;
            $user->manajer = 0;
            $user->kurir = 0;
            $user->pelanggan = 0;
        }
        elseif ($request->status == 'Manajer') {
            $user->admintoko = 0;
            $user->admintransaksi = 0;
            $user->manajer = 1;
            $user->kurir = 0;
            $user->pelanggan = 0;
        }
        elseif ($request->status == 'Kurir') {
            $user->admintoko = 0;
            $user->admintransaksi = 0;
            $user->manajer = 0;
            $user->kurir = 1;
            $user->pelanggan = 0;
        }
        elseif ($request->status == 'Pelanggan') {
            $user->admintoko = 0;
            $user->admintransaksi = 0;
            $user->manajer = 0;
            $user->kurir = 0;
            $user->pelanggan = 1;
        }
        else {
            $user->admin = 0;
            $user->peternak = 0;
            $user->pks = 0;
            $user->user = 0; 
        }
        $user->password=bcrypt($request->password);
        $user->save();

        $request->session()->flash('alert-success', 'Data has ben changed!');
        return redirect('/masteruser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::where('id', $id);
        $user->delete();

        $request->session()->flash('alert-danger', 'Data has been deleted!');
        return redirect('/masteruser');
    }
}
