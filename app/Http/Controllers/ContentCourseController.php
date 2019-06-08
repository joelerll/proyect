<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseUser;
use App\ContentCourse;
use Illuminate\Support\Facades\DB;

class ContentCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => []]);
    }

    public function getCourse(ContentCourse $ContentCourse) {
        $course_id  = request('course_id');
        $content = $ContentCourse->where('course_id', '=', $course_id)->with("videos")->get();
        return response()->json(["success" => true, "data" => $content]);
    }

    public function getContentDuration(ContentCourse $ContentCourse) {
        $content_id  = request('content_id');
        $content = \App\ContentCourse::select(DB::raw('SUM(TIME_TO_SEC(videos.duration)) as duration'))
        ->join('videos', 'content_courses.id', '=', 'videos.content_course_id')
        ->where('content_courses.id', $content_id)->first();
        return response()->json(["success" => true, "data" => $content]);
    }

}
