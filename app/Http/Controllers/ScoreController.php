<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Score;
use App\User;

class ScoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => []]);
    }


    public function course(Course $Course, Score $Score, User $User)
    {
        $user_id = auth()->user()->id;
        $id  = request('id');

        // protect route from another tutor
        $courses_user = \App\CourseUser::where('user_id', '=', $user_id)->pluck('course_id')->toArray();

        if (!in_array($id, $courses_user)) {
            return response()->json(['message' => 'No tiene permitido', "success" => false]);
        }

        $comment  = request('comment');
        $title  = request('title');
        $score  = request('score');
        $ScoreNew = new Score();
        $ScoreNew->comment = $comment;
        $ScoreNew->title = $title;
        $ScoreNew->score = $score;
        $ScoreNew->course_id = $id;
        $ScoreNew->user_id = $user_id;
        $ScoreNew->save();
        return response()->json(["success" => true, "data" => $ScoreNew]);
    }

    public function edit(Course $Course, Score $Score, User $User)
    {
        $user_id = auth()->user()->id;
        $course_id  = request('course_id');
        $score_id  = request('score_id');

        // protect route from another tutor
        $courses_user = \App\CourseUser::where('user_id', '=', $user_id)->pluck('course_id')->toArray();

        if (!in_array($course_id, $courses_user)) {
            return response()->json(['message' => 'No tiene permitido', "success" => false]);
        }

        $comment  = request('comment');
        $title  = request('title');
        $score  = request('score');
        $update = $Score->where("id", $score_id)->update(['comment' => $comment, "title" => $title, "score" => $score]);
        return response()->json(["success" => true, "data" => $update]);
    }
}
