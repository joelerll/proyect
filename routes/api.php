<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::post('me', 'AuthController@me');
Route::post('recover_password_send', 'AuthController@recoverPasswordSend');
Route::post('recover_password', 'AuthController@recoverPassword');

// Tutor endpoints
Route::get('tutor/statistics', 'TutorController@statistics');
Route::get('tutor/courses', 'TutorController@courses');

Route::get('courses', 'CoursesController@getAllByUser');
Route::get('courses/revenue/{id}', 'CoursesController@revenue');
Route::get('courses/students/{id}', 'CoursesController@students');
Route::get('courses/questions/{id}', 'CoursesController@questions');
// Route::get('courses/{id}/revenue', 'CoursesController@courseScore');

