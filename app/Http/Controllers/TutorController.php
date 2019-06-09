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

    public function payments() {

    }
}
