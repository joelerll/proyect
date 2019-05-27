<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interest;
use App\User;
use App\Course;
use App\InterestUser;

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

    public function get_client(Request $request, User $User, InterestUser $InterestUser)
    {
        $user_id = auth()->user()->id;
        $interests = $User->where('id', $user_id)->with('interest')->first()->interest;
        return response()->json($interests);
    }

    public function get_courses(Course $Course)
    {
        $courses = $Course->select('interests.name', 'interests.id', DB::raw('count(*) AS courses'))
                ->join('course_interests', 'courses.id', 'course_interests.course_id')
                ->join('interests', 'interests.id', 'course_interests.interest_id')
                ->groupBy('course_interests.interest_id')->get();
        return response()->json($courses);
    }
}
