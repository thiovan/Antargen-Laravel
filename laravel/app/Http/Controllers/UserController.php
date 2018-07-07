<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transformers\UserTransformer;
use Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $users = User::all();
    //     return response()->json([
    //     'pesan' => 'berhasil',
    //     'users' => $users
    // ], 200);
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $user = new User;
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = $request->password;
    //     $user->fullname = $request->fullname;
    //     $user->no_telp = $request->no_telp;
    //     $user->status = $request->status;
    //     $user->save();

    //     return response()->json([
    //         'pesan' => 'Data berhasil disimpan'
    //     ], 200);
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     $user = User::find($id);
    //     return response()->json([
    //     'pesan' => 'berhasil',
    //     'user' => $user
    // ], 200);
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $user =  User::find($id);
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = $request->password;
    //     $user->fullname = $request->fullname;
    //     $user->no_telp = $request->no_telp;
    //     $user->status = $request->status;
    //     $user->save();

    //     return response()->json([
    //         'pesan' => 'Data berhasil diupdate'
    //     ], 200);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $user = User::find($id);
    //     $user->delete();
    //     return response()->json([
    //         'pesan' => 'Data berhasil dihapus'
    //     ]);
    // }

    public function users(User $user)
    {
        $users = $user->all();

        return fractal()
            ->collection($users)
            ->transformWith(new UserTransformer)
            ->toArray();
    }

    // public function login(Request $request, User $user)
    // {
    //     if (!Auth::attempt(['email' => $request->email, 'password => $request->password'])) {
    //         return response()->json(['error' => 'Your credential is wrong', 401]);
    //     }

    //     $user $user->find(Auth::user()->id);

    //     return fractal()
    //         ->item($user)
    //         ->transformWith(new UserTransformer)
    //         ->toArray();
    // }
    // 
    
    public function getAllKurir(){
        $users = User::where('kurir', 1)->get();

        return fractal()
            ->collection($users)
            ->transformWith(new UserTransformer)
            ->toArray();
    }
}
