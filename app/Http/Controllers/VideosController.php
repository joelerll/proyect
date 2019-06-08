<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContentCourse;
use Illuminate\Support\Facades\DB;

class VideosController extends Controller
{
    public function getCourse() {
        return response()->json(["success" => true]);
    }

    public function getCourseDuration(ContentCourse $ContentCourse) {
        $course_id  = request('course_id');
        $content = \App\ContentCourse::select(DB::raw('SUM(TIME_TO_SEC(videos.duration)) as duration'))
        ->join('videos', 'content_courses.id', '=', 'videos.content_course_id')
        ->where('content_courses.course_id', $course_id)->get();
        return response()->json(["success" => true, "data" => $content]);
    }
}
