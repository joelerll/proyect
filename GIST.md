
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
