
// Route::group([
//     'middleware' => 'api',
// ], function ($router) {
//     Route::post('login', 'AuthController@login');
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');
// });


// Route::group(['middleware' => ['jwt.auth']], function() {
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');
//     Route::get('test', function(){
//         return response()->json(['foo'=>'bar']);
//     });
// });







// return response()->json(['total_students' => 500, 'total_revenue' => 600, 'average_score' => 4.6, 'courses_available' => 5, 'unanswered_questions' => 4]);
        // \App\User::roles($User->id)
        // $comments = \App\Course::with('users')->where('id', $User->id)->get();
        // $comments = \App\Course::with('users')->get();
        // $comments = \App\Course::where(['user_id'=>2])->get();
        // $User = \App\User::find($User->id);
        // $User->courses()->get();
        // $books = \App\User::with('users', function ($q) use ($authorId) {
        //     $q->where('id', $authorId);
        // })->get();



        // $comments = $user = \App\User::with('courses');
        // $comments = \App\User::with('courses')->get();
