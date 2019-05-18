<?php

namespace App\Http\Controllers;
use JWTAuth;
use Illuminate\Http\Request;

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
        if ($User->users_types_id != 2) {
            return response()->json(['error' => 'no puede ver esto']);
        }

        // get all users
        $User = \App\User::where('id', '=', $User->id)->with('courses')->get();

        $courses =  array();
        foreach ($User[0]->courses as $course) {
            $Course = \App\CourseUser::where('course_id', '=', $course->id)->get();

            // calculate score
            $scoreTotal = 0;
            foreach ($Course as $courseTotal) {
                $scoreTotal = $courseTotal->score + $scoreTotal;
            }
            $scoreTotal = ceil($scoreTotal/sizeof($Course));

            $myObj = array('name' => $course->name, 'average_score' => $scoreTotal, 'price' => $course->price, 'image' => $course->image);
            array_push($courses, $myObj);
        }
        return response()->json($courses);
    }

    // get month gananacias y ganacias totales
    public function revenue()
    {
        return response()->json(['total_students' => 500, 'total_revenue' => 600, 'average_score' => 4.6, 'courses_available' => 5, 'unanswered_questions' => 4]);
    }

    // estudiantes get all
    // estudiantes nuevos mes
    public function students()
    {
        return response()->json(['total_students' => 500, 'total_revenue' => 600, 'average_score' => 4.6, 'courses_available' => 5, 'unanswered_questions' => 4]);
    }

    // questions model
    // preguntas sin responder
}
