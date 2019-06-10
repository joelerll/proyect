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
Route::get('tutor/course', 'CoursesController@getAllByUser');
Route::get('tutor/course/revenue/{id}', 'CoursesController@revenue');
Route::get('tutor/course/student/{id}', 'CoursesController@students');
Route::get('tutor/course/question/{id}', 'CoursesController@questions');
Route::get('tutor/course/statistic', 'CoursesController@statistics');

// User Profiles
Route::get('user/profile', 'UserController@get_profile');
Route::put('user/profile', 'UserController@edit_profile');

Route::get('user/bank_info', 'UserController@get_bank_info');
Route::post('user/bank_info', 'UserController@create_bank_info');
Route::put('user/bank_info/{id}', 'UserController@edit_bank_info');

// user profiles
// Route::get('user/profile', 'UserController@get_profile');
// Route::put('user/profile', 'UserController@edit_profile');

// Tutor profile
Route::get('tutor/payments', 'TutorController@payments');

// Client home
Route::post('course/interest', 'CoursesController@get_all_by_interest');
Route::get('tutor/interest/{interest_id}', 'InterestController@get_tutors');


// Client Endpoints
Route::post('client/register', 'ClientController@create');

// Interest
Route::get('interest', 'InterestController@show');
Route::post('interest/client', 'InterestController@attach_interests');
Route::get('interest/client', 'InterestController@get_client');
Route::get('interest/course', 'InterestController@get_courses');

// Scores
Route::post('score/course/{id}', 'ScoreController@course');
Route::put('score/{score_id}/course/{course_id}', 'ScoreController@edit');

// Question
Route::post('question/course/{id}', 'QuestionController@create');
Route::get('question/course/{id}', 'QuestionController@get');

// Answer
Route::post('answer/question/{id}', 'AnswerController@create');


// cart
Route::post('cart', 'CartController@create');
Route::delete('cart/all', 'CartController@deleteAll'); // vaciar carrito
Route::delete('cart/{cart_id}/course/{course_id}', 'CartController@deleteCourse');
Route::put('cart/{cart_id}/course/{course_id}', 'CartController@addCourse');
Route::get('cart/user', 'CartController@getUserCart');

//course
Route::get('course/{course_id}', 'CoursesController@get');
Route::get('course/content/{course_id}', 'ContentCourseController@getCourse');
Route::get('course/tutor/{course_id}', 'TutorController@getTutor');

// video
// Route::get('course/video/{course_id}/duration', 'VideosController@getCourseDuration');

// content
Route::get('content/{content_id}/duration', 'ContentCourseController@getContentDuration');

// discount
Route::post('discount', 'DiscountController@create');
Route::post('discount/{discount_id}/course/{course_id}', 'DiscountController@add_course');

// testimonies
Route::get('testimonies', 'TestimoniesController@get');

// why use
Route::get('why_use', 'WhyUseController@get');
