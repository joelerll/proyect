<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use App\User;
use App\Course;

class AnswerController extends Controller
{
    public function create(Request $request, Answer $Answer)
    {
        $user_id = auth()->user()->id;
        $id = request('id');

        $bodyContent = json_decode($request->getContent());
        $answer = new $Answer();
        $answer->text = $bodyContent->text;
        $answer->user_id = $user_id;
        $answer->question_id = (int)$id;
        $answer->save();
        return response()->json($answer);
    }
}
