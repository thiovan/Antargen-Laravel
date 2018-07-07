<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transformers\UserTransformer;

use Auth;

class AuthController extends Controller
{
    public function login(Request $request, User $user)
    {
    	if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

    		// return response()->json(['error' => 'Your credential is wrong', 401]);
            return response()->json(['data' => array('name' => '', 'email' => '', 'pelanggan' => 0, 'kurir' => 0, 'status' => 0, 'pesan' => 'Login gagal')],401);
    	}

    	$user = $user->find(Auth::user()->id);

    	return fractal()
            ->item($user)
            ->transformWith(new UserTransformer)
       	   	->toArray();
    }
}
