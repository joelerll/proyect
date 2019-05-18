<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function statistics()
    {
        // total_students
        // total_revenue
        // average_score
        // courses_available
        // unanswered_questions
        return response()->json(['total_students' => 500, 'total_revenue' => 600, 'average_score' => 4.6, 'courses_available' => 5, 'unanswered_questions' => 4]);
    }
}
