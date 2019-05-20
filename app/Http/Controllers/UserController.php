<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['create']]);
    }

    public function create(Request $request)
    {
        $bodyContent = json_decode($request->getContent());
        $user = new \App\User();
        $user->password = Hash::make($bodyContent->password);
        $user->email = $bodyContent->email;
        $user->names = $bodyContent->names;
        $user->users_types_id = 1;
        $user->surname = $bodyContent->surnames;
        $user->save();
        return response()->json($bodyContent);
    }
}
