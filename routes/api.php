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

// User Endpoints
Route::post('user/register', 'UserController@create');

// Tutor endpoints profile
Route::get('tutor/courses', 'CoursesController@getAllByUser');
Route::get('tutor/courses/revenue/{id}', 'CoursesController@revenue');
Route::get('tutor/courses/students/{id}', 'CoursesController@students');
Route::get('tutor/courses/questions/{id}', 'CoursesController@questions');
Route::get('tutor/courses/statistics', 'CoursesController@statistics');

// #### Tutor endpoints
Route::get('tutor/profile', 'TutorController@get_profile');
Route::post('tutor/profile', 'TutorController@edit_profile');

Route::get('tutor/bank_info', 'TutorController@get_bank_info');
Route::post('tutor/bank_info', 'TutorController@edit_bank_info');

Route::get('tutor/payments', 'TutorController@payments');

