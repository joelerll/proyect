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

    public function getAllByUser()
    {
        $user_type = 2;
        $User = auth()->user();
        if ($User->user_type_id != $user_type) {
            return response()->json(['error' => 'You can not view this']);
        }

        // get all courses of this user
        $Courses_user = \App\CourseUser::where('user_id', '=', $User->id)->pluck('course_id');

        $Courses = \App\Course::select('courses.*', DB::raw('avg(scores.score) AS average_score'))
                ->join('scores', 'scores.course_id', '=', 'courses.id')
                ->groupBy('scores.course_id')
                ->whereIn('courses.id', $Courses_user)
                ->get();

        return response()->json($Courses);
    }

    // FIXME: puede obtener de otros cursos el profesor
    public function revenue()
    {
        $id  = request('id');
        $clientId = 1;

        $Course = \App\Course::where('id', '=', $id)->first();

        $CourseUser = \App\CourseUser::whereHas('user', function($query) use ($clientId) {
            $query->where('user_type_id', $clientId);
        })->where('course_id', '=', $id)->get();

        $revenueLastMonth = \App\CourseUser::whereBetween('created_at', [
            Carbon::now()->startOfMonth()->toDateString(),
            Carbon::now()->endOfMonth()->toDateString(),
        ])->whereHas('user', function($query) use ($clientId) {
            $query->where('user_type_id', $clientId);
        })->where('course_id', '=', $id)->get();

        return response()->json(['month_revenue' => sizeof($revenueLastMonth) * $Course->price, 'total_revenue' => sizeof($CourseUser) * $Course->price]);
    }

    public function students()
    {
        $clientId = 1;
        $id  = request('id');

        $CourseUser = \App\CourseUser::whereHas('user', function($query) use ($clientId) {
            $query->where('user_type_id', $clientId);
        })->where('course_id', '=', $id)->get();

        $revenueLastMonth = \App\CourseUser::whereBetween('created_at', [
            Carbon::now()->startOfMonth()->toDateString(),
            Carbon::now()->endOfMonth()->toDateString(),
        ])->whereHas('user', function($query) use ($clientId) {
            $query->where('user_type_id', $clientId);
        })->where('course_id', '=', $id)->get();

        return response()->json(['total_students' => sizeof($CourseUser), 'total_student_month' => sizeof($revenueLastMonth)]);
    }

    public function questions()
    {
        $id  = request('id');
        $questions = \App\Question::where('course_id', $id)->with('answers')->get();

        $questionsAnswered = \App\Question::whereHas('answers')->where('course_id', $id)->get();

        return response()->json(['questions_without_answer' => sizeof($questions) - sizeof($questionsAnswered), 'questions' => $questions]);
    }

    public function statistics()
    {
        $user_id = auth()->user()->id;
        // total_students. Obtener todos los cursos, con estos obtener todos los usuarios tipo 1
        // total_revenue. Obtener todos los cursos, obtener todos lo students de ese curso, por cada curso multiplicar el price
        // average_score. Obtener todos los cursos, obtener todos los students tipo 1 y sacar un promedio
        // courses_available
        // unanswered_questions

        // $CourseUser = \App\CourseUser::whereHas('user', function($query) use ($clientId) {
        //     $query->where('user_type_id', $clientId);
        // })->where('course_id', '=', $id)->get();
        $courses = \App\User::with('courses')->where('id', $user_id)->first()->courses;
        return response()->json(['total_students' => 500, 'total_revenue' => 600, 'average_score' => $courses, 'courses_available' => 5, 'unanswered_questions' => 4]);
    }

    // questions model
    // preguntas sin responder
}
