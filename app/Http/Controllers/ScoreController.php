<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Score;
use App\User;

class ScoreController extends Controller
{
    public function course(Course $Course, Score $Score, User $User)
    {
        $user_id = auth()->user()->id;
        $id  = request('id');

        // protect route from another tutor
        $courses_user = \App\CourseUser::where('user_id', '=', $user_id)->pluck('course_id')->toArray();

        if (!in_array($id, $courses_user)) {
            return response()->json(['message' => 'No tiene permitido']);
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
        return response()->json($ScoreNew);
    }
}
