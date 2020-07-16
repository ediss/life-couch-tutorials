<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', 'Auth\CustomLoginController@showLoginForm')->name('login')->middleware('guest');
Route::post('/login', 'Auth\CustomLoginController@login')->name('custom.login.submit');
Route::any('/logout', 'Auth\CustomLoginController@logout')->name('custom.logout');


//admin routes
Route::prefix("admin/")->middleware(['auth','admin'])->group(function(){
    Route::any('courses',                           'AdminController@index')            ->name("admin.courses");
    Route::any('create-course',                     'AdminController@createCourse')     ->name("admin.create-course");
    Route::any('add-user-to-course/{course_id}',    'AdminController@addUserToCourse')  ->name("admin.add.user.to.course");
    Route::any('edit-course/{course_id}',           'AdminController@editCourse')       ->name("admin.edit.course");
});


//end of admin routes
Route::get('courses',                                   'CourseController@index')                   ->name("all-courses");
Route::get('prepare-course/{id}/{device?}',             'CourseController@preparingCourse')         ->name("prepare-course");
Route::get('course/{id}/{device?}',                     'CourseController@singleCourse')            ->name("single-course");
Route::any('course-subscription/{course_id?}',          'CourseController@courseSubscription')      ->name("course.subscription");
Route::get('About-me',                                  'HomeController@about')                     ->name("about");
Route::any('contact',                                   'ContactController@index')                  ->name("contact");

Route::get('My-Courses',                                'UserController@index')                     ->name("user.courses")->middleware('auth');


Route::any('/', 'HomeController@index')->name('homepage');


Route::get('/test-email', function () {
    return view('mails.test-mail');
});


Route::any('test#about-me', function () {
    return view('about');
});


