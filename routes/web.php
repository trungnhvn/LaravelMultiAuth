<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout','Auth\LoginController@userLogout')->name('user.logout');

//admin route for our multi-auth system

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@create')->name('admin.register.submit');

    //admin password reset routes
    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});
Route::prefix('student')->group(function () {
    Route::get('/', 'StudentController@index')->name('student.dashboard');
    Route::get('/login', 'Auth\StudentLoginController@showLoginForm')->name('student.login');
    Route::post('/login', 'Auth\StudentLoginController@login')->name('student.login.submit');
    Route::get('/logout','Auth\StudentLoginController@logout')->name('student.logout');
    Route::get('/register', 'Auth\StudentRegisterController@showRegisterForm')->name('student.register');
    Route::post('/register', 'Auth\StudentRegisterController@create')->name('student.register.submit');

    //admin password reset routes
    Route::post('/password/email','Auth\StudentForgotPasswordController@sendResetLinkEmail')->name('student.password.email');
    Route::get('/password/reset','Auth\StudentForgotPasswordController@showLinkRequestForm')->name('student.password.request');
    Route::post('/password/reset','Auth\StudentResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\StudentResetPasswordController@showResetForm')->name('student.password.reset');
});






