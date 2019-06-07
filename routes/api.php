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

// basic post
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::post('me', 'AuthController@me');
Route::post('recover_password_send', 'AuthController@recoverPasswordSend');
Route::post('recover_password', 'AuthController@recoverPassword');

// Tutor dashboard
Route::get('tutor/courses', 'CoursesController@getAllByUser');
Route::get('tutor/courses/revenue/{id}', 'CoursesController@revenue');
Route::get('tutor/courses/students/{id}', 'CoursesController@students');
Route::get('tutor/courses/questions/{id}', 'CoursesController@questions');
Route::get('tutor/courses/statistics', 'CoursesController@statistics');

// Tutor profile
Route::get('tutor/profile', 'TutorController@get_profile');
Route::put('tutor/profile', 'TutorController@edit_profile');
Route::get('tutor/bank_info', 'TutorController@get_bank_info');
Route::put('tutor/bank_info/{id}', 'TutorController@edit_bank_info');
Route::get('tutor/payments', 'TutorController@payments');

// Client dashboard
// Client profile

// Client Endpoints
Route::post('client/register', 'ClientController@create');

// Interest
Route::get('interest', 'InterestController@show');
Route::post('interest/client', 'InterestController@attach_interests');
Route::get('interest/client', 'InterestController@get_client');
Route::get('interest/course', 'InterestController@get_courses');

// Scores
Route::post('score/course/{id}', 'ScoreController@course');

// Question
Route::post('question/course/{id}', 'QuestionController@create');
Route::get('question/course/{id}', 'QuestionController@get');

// Answer
Route::post('answer/question/{id}', 'AnswerController@create');
