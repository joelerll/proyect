<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CourseUser;
use App\Course;
use App\UserExtraInfo;
use App\UserBankInfo;

class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => []]);
    }

    public function getTutor(CourseUser $CourseUser, Course $Course) {
        // valorations
        // number estudents
        $course_id  = request('course_id');
        $clientId = 2;
        $CourseUser = \App\User::select("*")
                ->join('course_user', 'users.id', '=', 'course_user.user_id')
                ->where('course_user.course_id', $course_id)
                ->where('users.user_type_id', $clientId)
                ->get();
        return response()->json(["success" => true, "data" => $CourseUser]);
    }

    public function get_profile() {
        $user_id = auth()->user()->id;
        $User = \App\User::where('id', $user_id)->with('extra_info')->first();
        return response()->json(["success" => true, "data" => $User]);
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

        return response()->json(["success" => true, "data" => $user]);
    }

    public function  create_bank_info(UserBankInfo $UserBankInfo) {
        $user_id = auth()->user()->id;
        $name  = request('name');
        $account_number  = request('account_number');
        $email  = request('email');
        $document_type  = request('document_type');
        $dni  = request('dni');
        $bank_name  = request('bank_name');

        $bank = new UserBankInfo();
        $bank->account_number = $account_number;
        $bank->name = $name;
        $bank->email = $email;
        $bank->document_type = $document_type;
        $bank->dni = $dni;
        $bank->bank_name = $bank_name;
        $bank->user_id = $user_id;
        $bank->save();
        return response()->json(["success" => true, "data" => $bank]);
    }

    public function  get_bank_info() {
        $user_id = auth()->user()->id;
        $BankInfo = \App\UserBankInfo::where('user_id', $user_id)->get();
        return response()->json(["success" => true, "data" => $BankInfo]);
    }

    public function edit_bank_info(UserBankInfo $UserBankInfo) {
        $user_id = auth()->user()->id;
        $id  = request('id');
        $account_number  = request('account_number');
        $name  = request('name');
        $email  = request('email');
        $document_type  = request('document_type');
        $dni  = request('dni');
        $bank_name  = request('bank_name');
        $UserBankInfo->where('user_id', $user_id)->where('id', $id)->update(['account_number' => $account_number, 'name' => $name, 'email' => $email, 'document_type' => $document_type, 'dni' => $dni, 'bank_name' => $bank_name]);

        $BankInfo = $UserBankInfo->where('user_id', '=', $user_id)->where('id','=', $id)->first();

        return response()->json(["success" => true, "data" => $BankInfo]);
    }


    public function payments() {

    }
}
