<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interest;
use App\User;
use App\Course;
use App\InterestUser;
use App\CourseInterest;
use Illuminate\Support\Facades\DB;

class InterestController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => []]);
    }

    public function show(Interest $Interest)
    {
        return response()->json(["success" => true, "data" => $Interest->get()]);
    }

    public function attach_interests(Request $request, User $User, Interest $Interest)
    {
        $user_id = auth()->user()->id;
        $user = $User->where('id', $user_id)->first();
        $interests  = request('interests');
        return response()->json(["success" => true, "data" => $user->interest()->sync($interests)]);
    }

    public function get_client(Request $request, User $User, InterestUser $InterestUser)
    {
        $user_id = auth()->user()->id;
        $interests = $User->where('id', $user_id)->with('interest')->first()->interest;
        return response()->json(["success" => true, "data" => $interests]);
    }

    public function get_courses(Course $Course)
    {
        $courses = $Course->select('interests.name', 'interests.id', DB::raw('count(*) AS courses'))
                ->join('course_interests', 'courses.id', 'course_interests.course_id')
                ->join('interests', 'interests.id', 'course_interests.interest_id')
                ->groupBy('course_interests.interest_id')->get();
        return response()->json(["success" => true, "data" => $courses]);
    }

    public function get_tutors(CourseInterest $CourseInterest, Course $Course)
    {
        $clientId = 2;
        $interest_id  = request('interest_id');
        $coursesInterest = $CourseInterest->where('interest_id', $interest_id)->get()->pluck('course_id')->toArray();

        $courses = $Course->whereIn('id', $coursesInterest)->with(['users' => function ($query) use ($clientId) {
            $query->where('user_type_id', $clientId);
         }])->get()->pluck('users');

        return response()->json(["success" => true, "data" => $courses]);
    }
}
