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
        $id  = request('id') ;
        // $Course->price
        $Course = \App\Course::where('id', '=', $id)->first();
        $CourseUser = \App\CourseUser::where('course_id', '=', $id)->get();

        $total_revenue =  sizeof($CourseUser) * $Course->price;

        $fromDate = Carbon::now()->subMonth()->startOfMonth()->toDateString();
        $tillDate = Carbon::now()->subMonth()->endOfMonth()->toDateString();

        // $revenueLastMonth = \App\CourseUser::whereBetween(DB::raw('date(created_at)'), [$fromDate, $tillDate])->get();
        // $revenueLastMonth = \App\CourseUser::whereBetween('created_at', [
        //     Carbon::now()->subMonth()->startOfMonth()->toDateString(),
        //     Carbon::now()->subMonth()->endOfMonth()->toDateString(),
        // ]);
        return response()->json(['month_revenue' => -1, 'total_revenue' => $total_revenue]);
    }

    // estudiantes get all
    // estudiantes nuevos mes
    public function students()
    {
        return response()->json(['total_students' => 500, 'total_revenue' => 600, 'average_score' => 4.6, 'courses_available' => 5, 'unanswered_questions' => 4]);
    }

    public function questions()
    {
        return response()->json(['total_students' => 500, 'total_revenue' => 600, 'average_score' => 4.6, 'courses_available' => 5, 'unanswered_questions' => 4]);
    }

    // questions model
    // preguntas sin responder
}
