<?php

namespace App\Http\Controllers;
use JWTAuth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => []]);
    }

    // get courses by user
    public function getAllByUser()
    {
        $User = auth()->user();
        // fixme protect api
        if ($User->users_types_id != 2) {
            return response()->json(['error' => 'no puede ver esto']);
        }

        // get all courses of this user
        $User = \App\User::find($User->id)->with('courses')->first();

        $courses =  array();
        foreach ($User->courses as $course) {
            $Course = \App\Course::where('id', $course->id)->with('users')->first();
            $scoreTotal = 0;
            $count = 0;
            foreach ($Course->users as $courseTotal) {
                if ($courseTotal->users_types_id == 2) {
                    $scoreTotal = $courseTotal->pivot->score + $scoreTotal;
                    $count = $count + 1;
                }
            }

            if ($count != 0) {
                $scoreTotal = ceil($scoreTotal/$count);
            }

            $obj = array('name' => $course->name, 'average_score' => $scoreTotal, 'price' => $course->price, 'image' => $course->image);
            array_push($courses, $obj);
        }

        return response()->json($courses);
    }

    public function revenue()
    {
        $id  = request('id');
        $clientId = 1;

        $Course = \App\Course::where('id', '=', $id)->first();

        $CourseUser = \App\CourseUser::whereHas('user', function($query) use ($clientId) {
            $query->where('users_types_id', $clientId);
        })->where('course_id', '=', $id)->get();

        $revenueLastMonth = \App\CourseUser::whereBetween('created_at', [
            Carbon::now()->startOfMonth()->toDateString(),
            Carbon::now()->endOfMonth()->toDateString(),
        ])->whereHas('user', function($query) use ($clientId) {
            $query->where('users_types_id', $clientId);
        })->where('course_id', '=', $id)->get();

        return response()->json(['month_revenue' => sizeof($revenueLastMonth) * $Course->price, 'total_revenue' => sizeof($CourseUser) * $Course->price]);
    }

    public function students()
    {
        $id  = request('id');
        $clientId = 1;
        $CourseUser = \App\CourseUser::whereHas('user', function($query) use ($clientId) {
            $query->where('users_types_id', $clientId);
        })->where('course_id', '=', $id)->get();

        $revenueLastMonth = \App\CourseUser::whereBetween('created_at', [
            Carbon::now()->startOfMonth()->toDateString(),
            Carbon::now()->endOfMonth()->toDateString(),
        ])->whereHas('user', function($query) use ($clientId) {
            $query->where('users_types_id', $clientId);
        })->where('course_id', '=', $id)->get();

        return response()->json(['total_students' => sizeof($CourseUser), 'total_student_month' => sizeof($revenueLastMonth)]);
    }

    public function questions()
    {
        return response()->json(['total_students' => 500, 'total_revenue' => 600, 'average_score' => 4.6, 'courses_available' => 5, 'unanswered_questions' => 4]);
    }

    // questions model
    // preguntas sin responder
}
