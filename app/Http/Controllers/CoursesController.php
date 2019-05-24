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
        if ($User->user_type_id != 2) {
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
                if ($courseTotal->user_type_id == 2) {
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

    // FIXME: puede obtener de otros cursos
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
