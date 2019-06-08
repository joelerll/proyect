<?php

namespace App\Http\Controllers;
use JWTAuth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Course;
use App\Score;
use App\User;
use App\CourseUser;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Collection;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => []]);
    }

    public function get(CourseUser $CourseUser, Course $Course) {
        $course_id  = request('course_id');
        $user_id = auth()->user()->id;
        $courses_user = $CourseUser->where('user_id', '=', $user_id)->pluck('course_id')->toArray();

        if (!in_array($course_id, $courses_user)) {
            return response()->json(['message' => 'No tiene permisos para ver este curso', "success" => false]);
        }

        $course = $Course->where("id", $course_id)->first();
        return response()->json(["success" => true, "data" => $course]);
    }

    public function getAllByUser()
    {
        $user_type = 2;
        $User = auth()->user();
        $user_id = auth()->user()->id;
        if ($User->user_type_id != $user_type) {
            return response()->json(['message' => 'No tiene permisos para ver esto', "success" => false]);
        }

        // get all courses of this user
        $Courses_user = \App\CourseUser::where('user_id', '=', $User->id)->pluck('course_id');

        $Courses = \App\Course::select('courses.*', DB::raw('avg(scores.score) AS average_score'))
                ->join('scores', 'scores.course_id', '=', 'courses.id')
                ->groupBy('scores.course_id')
                ->whereIn('courses.id', $Courses_user)
                ->get();

        return response()->json(["success" => true, "data" => $Courses]);
    }

    public function revenue()
    {
        $id  = request('id');
        $user_id = auth()->user()->id;
        $clientId = 1;

        // protect route from another tutor
        $courses_user = \App\CourseUser::where('user_id', '=', $user_id)->pluck('course_id')->toArray();

        if (!in_array($id, $courses_user)) {
            return response()->json(['message' => 'No tiene permisos para ver esto', "success" => false]);
        }

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

        return response()->json(["data" => [
            ['month_revenue' => sizeof($revenueLastMonth) * $Course->price, 'total_revenue' => sizeof($CourseUser) * $Course->price]
        ], "success" => false]);
    }

    public function students()
    {
        $clientId = 1;
        $id  = request('id');
        $user_id = auth()->user()->id;

        // protect route from another tutor
        $courses_user = \App\CourseUser::where('user_id', '=', $user_id)->pluck('course_id')->toArray();

        if (!in_array($id, $courses_user)) {
            return response()->json(['message' => 'No tiene permisos para ver esto', "success" => false]);
        }

        $CourseUser = \App\CourseUser::whereHas('user', function($query) use ($clientId) {
            $query->where('user_type_id', $clientId);
        })->where('course_id', '=', $id)->get();

        $revenueLastMonth = \App\CourseUser::whereBetween('created_at', [
            Carbon::now()->startOfMonth()->toDateString(),
            Carbon::now()->endOfMonth()->toDateString(),
        ])->whereHas('user', function($query) use ($clientId) {
            $query->where('user_type_id', $clientId);
        })->where('course_id', '=', $id)->get();

        return response()->json(["data" => [
            'total_students' => sizeof($CourseUser), 'total_student_month' => sizeof($revenueLastMonth)
        ], "success" => true]);
    }

    public function questions()
    {
        $id  = request('id');
        $user_id = auth()->user()->id;

        // protect route from another tutor
        $courses_user = \App\CourseUser::where('user_id', '=', $user_id)->pluck('course_id')->toArray();

        if (!in_array($id, $courses_user)) {
            return response()->json(['message' => 'No tiene permisos para ver esto', "success" => false]);
        }

        $questions = \App\Question::where('course_id', $id)->with('answers')->get();

        $questionsAnswered = \App\Question::whereHas('answers')->where('course_id', $id)->get();

        return response()->json(["data" => [
            'questions_without_answer' => sizeof($questions) - sizeof($questionsAnswered), 'questions' => $questions
        ], "success" => true]);
    }

    public function statistics()
    {
        $user_id = auth()->user()->id;
        $user_type = 1;
        $courses_user = \App\CourseUser::where('user_id', '=', $user_id)->pluck('course_id');

        $total_students = \App\User::select(DB::raw('count(*) AS users'))
                ->join('course_user', 'users.id', '=', 'course_user.user_id')
                ->whereIn('course_user.course_id', $courses_user)
                ->where('users.user_type_id', $user_type)
                ->first()->users;

        $total_revenue =  \App\Course::select(DB::raw('count(*) * courses.price AS users'))
        ->join('course_user', 'courses.id', '=', 'course_user.course_id')
        ->join('users', 'users.id', '=', 'course_user.user_id')
        ->where('users.user_type_id', $user_type)
        ->whereIn('courses.id', $courses_user)
        ->groupBy('courses.id')->pluck('users');

        $average_score = \App\Course::select(DB::raw('avg(scores.score) AS average_score'))
                ->join('scores', 'scores.course_id', '=', 'courses.id')
                ->whereIn('courses.id', $courses_user)
                ->first()->average_score;
        $courses_available = sizeof($courses_user);


        $questions = \App\Question::whereIn('course_id', $courses_user)->with('answers')->get();
        $questionsAnswered = \App\Question::whereHas('answers')->whereIn('course_id', $courses_user)->get();
        $unanswered_questions = sizeof($questions) - sizeof($questionsAnswered);

        return response()->json(["success" => true, "data" => [
            'total_students' => $total_students, 'total_revenue' =>  collect($total_revenue)->sum(), 'average_score' => $average_score, 'courses_available' =>  $courses_available, 'unanswered_questions' =>  $unanswered_questions
        ]]);
    }
}
