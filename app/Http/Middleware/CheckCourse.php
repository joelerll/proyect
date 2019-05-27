<?php

namespace App\Http\Middleware;

use Closure;
use App\CourseUser;

class CheckCourse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, CourseUser $CourseUser)
    {
        $user_id = auth()->user()->id;

        $courses_user = $CourseUser->where('user_id', '=', $user_id)->pluck('course_id')->toArray();

        if (!in_array($id, $courses_user)) {
            return response()->json(['message' => 'No tiene permitido']);
        }

        return $next($request);
    }
}
