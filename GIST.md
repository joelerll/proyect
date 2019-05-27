Main difference is as below:

belongsTo and belongsToMany you're telling Laravel that this table holds the foreign key that connects it to the other table

hasOne and hasMany is telling Laravel that this table does not have the foreign key


->withPivot('score');

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

       // $year = Carbon::now()->year;
        // $month = Carbon::now()->month;
        // $revenueMonth = \App\CourseUser::whereMonth(
        //     'created_at', '>=', Carbon::now()->subMonth()->toDateTimeString()
        // );
        // $users = \App\CourseUser::select(['*',DB::raw('MONTH(created_at) as month')])
        // ->whereRaw('MONTH(created_at) = ?',[4])->get()
        // $currentMonth = date('m');
        // $data = DB::table("items")
        //             ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
        //             ->get();

        // $post = \App\CourseUser::->whereYear('created_at', Carbon::now()->year)
        // ->whereMonth('created_at', Carbon::now()->month)
        // $month_revenue =  sizeof($revenueMonth) * $Course->price;


            // $Course = \App\Course::where('id', $course->id)->with('course.users')->get();
            // $Course = \App\Course::where('id', $course->id)->whereHas('users', function($query) {
            //     $query->where('users_types_id', '=', 2);
            // })->get();
            // $Course = \App\User::with('course_user')->get();
            // $Course = \App\Course::whereHas('users', function($q) {
            //     $q->where('users_types_id', 2);
            // })->where('id', '=', $course->id)->get();

            // $Course = \App\Course::where('id', $course->id)->with('users')->get();
            // // ->users()->where('users_types_id', '=', 2)
            // // $Course = \App\User::where('users_types_id', 2)->with('courses')->where('courses.id', '=', $course->id)->get();
            // // $Course = \App\CourseUser::with('users')->where('course_id', '=', $course->id)->get();
            // // where('course_id', '=', $course->id)-> ->where('users_types_id', '=', 2)->get();
            // // calculate score


       // AudioFiles::whereHas('podcast', function($query) use ($user) {
        //     return $query->whereHas('user', function($query) use ($user) {
        //         return $query->where('user_id', $user->id)
        //             ->where('has_paid', true);
        //     });
        // })->orderBy('created_at', 'desc')->get();

        // $query = DB::table('users')->where('users_types_id', 1)
        //     // ->select('course_id')
        //     ->join('course_user', 'users.id', '=', 'course_user.user_id')
        //     ->join('courses', 'courses.id', '=', 'course_user.course_id')
        //     // ->groupBy('course_id')
        //     ->get();

        // $courses =  array();
        // foreach ($query as $course) {
        //     $obj = array('name' => $course->name, 'average_score' => $scoreTotal, 'price' => $course->price, 'image' => $course->image);
        //     array_push($courses, $obj);
        // }



 * hasOne / hasMany (1-1, 1-M)
    -save(new or existing child)
    -saveMany(array of models new or existing)
    -create(array of attributes)
    -createMany(array of arrays of attributes)
    ---------------------------------------------------------------------------

 * belongsTo (M-1, 1-1)
    -associate(existing model)
    ---------------------------------------------------------------------------

 *  belongsToMany (M-M)
    -save(new or existing model, array of pivot data, touch parent = true)
    -saveMany(array of new or existing model, array of arrays with pivot ata)
    -create(attributes, array of pivot data, touch parent = true)
    -createMany(array of arrays of attributes, array of arrays with pivot data)
    -attach(existing model / id, array of pivot data, touch parent = true)
    -sync(array of ids OR ids as keys and array of pivot data as values, detach = true)
    -updateExistingPivot(relatedId, array of pivot data, touch)
    ---------------------------------------------------------------------------

 *  morphTo (polymorphic M-1)
    // the same as belongsTo
    ---------------------------------------------------------------------------

 *  morphOne / morphMany (polymorphic 1-M)
    // the same as hasOne / hasMany
    ---------------------------------------------------------------------------

 *  morphedToMany /morphedByMany (polymorphic M-M)
    // the same as belongsToMany
