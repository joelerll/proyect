<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interest;
use App\User;

class InterestController extends Controller
{
    public function show(Interest $Interest)
    {
        return response()->json($Interest->get());
    }


    public function attach_interests(Request $request, User $User, Interest $Interest)
    {
        $user_id = auth()->user()->id;
        $user = $User->where('id', $user_id)->first();
        $interests  = request('interests');
        return response()->json($user->interest()->sync($interests));
    }
}
