<?php

namespace App\Http\Controllers;
use JWTAuth;
use Illuminate\Http\Request;
use App\User;

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
        // return response()->json(['total_students' => 500, 'total_revenue' => 600, 'average_score' => 4.6, 'courses_available' => 5, 'unanswered_questions' => 4]);
        return response()->json();
    }

    // get courseId score
    public function courseScore()
    {
        return response()->json(['total_students' => 500, 'total_revenue' => 600, 'average_score' => 4.6, 'courses_available' => 5, 'unanswered_questions' => 4]);
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
