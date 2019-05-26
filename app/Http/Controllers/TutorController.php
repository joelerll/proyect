<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserExtraInfo;

class TutorController extends Controller
{

    public function get_profile() {
        $user_id = auth()->user()->id;
        $User = \App\User::where('id', $user_id)->with('extra_info')->first();
        return response()->json($User);
    }

    public function  edit_profile(User $User, UserExtraInfo $UserExtraInfo) {
        $user_id = auth()->user()->id;
        $names  = request('names');
        $surnames  = request('surnames');
        $country  = request('country');
        $document_type  = request('document_type');
        $dni  = request('dni');
        $career  = request('career');
        $description  = request('description');

        $User->where('id', $user_id)->update(['names' => $names, 'surnames' => $surnames]);

        $UserExtraInfo->where('user_id', $user_id)->update(['country' => $country, 'document_type' => $document_type, 'dni' => $dni, 'career' => $career, 'description' => $description]);

        $user = \App\User::where('id', $user_id)->with('extra_info')->first();

        return response()->json($user);
    }

    public function  get_bank_info() {

    }


    public function edit_bank_info() {

    }


    public function payments() {

    }
}
