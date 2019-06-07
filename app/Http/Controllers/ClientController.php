<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interest;
use App\User;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['create']]);
    }

    public function create(Request $request, User $User)
    {
        $bodyContent = json_decode($request->getContent());
        if ($User->where("email", $bodyContent->email)->first()) {
            return response()->json(["data" => json_decode ("{}"), "message" => "usuario ya existe", "success" => false]);
        }
        $user = new \App\User();
        $user->password = Hash::make($bodyContent->password);
        $user->email = $bodyContent->email;
        $user->names = $bodyContent->names;
        $user->user_type_id = 1;
        $user->surnames = $bodyContent->surnames;
        $user->save();
        return response()->json($user);
    }
}
