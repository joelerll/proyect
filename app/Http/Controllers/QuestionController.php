<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use App\User;
use App\Course;
use App\CourseUser;

class QuestionController extends Controller
{
    public function create(Request $request, Question $Question, CourseUser $CourseUser)
    {
        $user_id = auth()->user()->id;
        $id = request('id');

        $courses_user = $CourseUser->where('user_id', '=', $user_id)->pluck('course_id')->toArray();

        if (!in_array($id, $courses_user)) {
            return response()->json(['message' => 'No tiene permitido']);
        }

        $bodyContent = json_decode($request->getContent());
        $question = new \App\Question();
        $question->text = $bodyContent->text;
        $question->title = $bodyContent->title;
        $question->user_id = $user_id;
        $question->course_id = (int)$id;
        $question->save();
        return response()->json($question);
    }

    public function get(Request $request, Question $Question, CourseUser $CourseUser)
    {
        $user_id = auth()->user()->id;
        $id = request('id');

        $courses_user = $CourseUser->where('user_id', '=', $user_id)->pluck('course_id')->toArray();

        if (!in_array($id, $courses_user)) {
            return response()->json(['message' => 'No tiene permitido']);
        }

        return response()->json($Question->where('course_id', $id)->with('answers')->get());
    }
}
