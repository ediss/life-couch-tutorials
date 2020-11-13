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

Route::view('/not-allowed', 'access-not-allowed')->name('access.not.allowed');




//admin routes
Route::prefix("admin/")->middleware(['auth','admin'])->group(function(){
    Route::any('courses',                           'AdminController@index')            ->name("admin.courses");
    Route::any('course-users/{course_id}',          'AdminController@courseUsers')      ->name("course.users");
    Route::any('create-course',                     'AdminController@createCourse')     ->name("admin.create-course");
    Route::any('add-user-to-course/{course_id}',    'AdminController@addUserToCourse')  ->name("admin.add.user.to.course");
    Route::any('edit-course/{course_id}',           'AdminController@editCourse')       ->name("admin.edit.course");
    Route::any('delete-course/{course_id}',         'AdminController@deleteCourse')     ->name("admin.delete.course");
});


//end of admin routes
Route::get('kursevi',                                   'CourseController@index')                   ->name("all-courses");
// Route::any('prepare-course',                            'CourseController@preparingCourse')         ->name("prepare-course");
Route::get('kurs/{id}',                                 'CourseController@singleCourse')            ->name("single-course");
Route::any('course-subscription/{course_id?}',          'CourseController@courseSubscription')      ->name("course.subscription");
Route::any('get-phone-code',                            'CourseController@getPhoneCode')            ->name("get.phone.code");
Route::get('O-meni',                                    'HomeController@about')                     ->name("about");
Route::any('Kontakt',                                   'ContactController@index')                  ->name("contact");

Route::get('My-Courses',                                'UserController@index')                     ->name("user.courses")->middleware('auth');


Route::any('/', 'HomeController@index')->name('homepage');


Route::get('/test-email', function () {
    return view('mails.test-mail');
});


Route::any('test#about-me', function () {
    return view('about');
});



// Auth::routes();

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/home', 'HomeController@index')->name('home');
