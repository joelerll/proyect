<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interest;
use App\User;

class ClientController extends Controller
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
        $user->user_type_id = 1;
        $user->surname = $bodyContent->surnames;
        $user->save();
        return response()->json($bodyContent);
    }

    public function attach_interests(Request $request, User $User, Interest $Interest)
    {
        $user_id = auth()->user()->id;
        $user = $User->where('id', $user_id)->first();
        $interests  = request('interests');
        return response()->json($user->interest()->sync($interests));
    }
}
