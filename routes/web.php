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

Route::get('admin_login', 'AdminAuth\LoginController@showLoginForm')->name('admin-login');
Route::post('admin_login', 'AdminAuth\LoginController@login');
Route::post('admin_logout', 'AdminAuth\LoginController@logout');
Route::post('admin_password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
Route::get('admin_password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('admin_password/reset', 'AdminAuth\ResetPasswordController@reset');
Route::get('admin_password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin_home', 'AdminHomeController@index');

Route::prefix('admin_home')->group(function() {
    Route::get('/setup','QuestionController@setup')->name('admin.setup');
    Route::get('/addgroup','GroupController@create')->name('create');
    Route::post('/add/groups', 'GroupController@addAndUpdateGroups')->name('add_group');

    Route::get('/addquiz', 'QuestionController@addquiz')->name('addquiz'); 
    Route::post('/addquizdata', 'QuestionController@addQuizData')->name('addquizdata');
    Route::post('/addquestiondata_text', 'QuestionController@addQuestionDataText')->name('addquestiondata_text');
    
    Route::get('/viewquiz','QuestionController@index')->name('viewquiz');
    Route::get('/quiz/{id}/edit', 'QuestionController@editquiz');
    Route::post('/quiz/{id}/update', 'QuestionController@updatequiz');
    Route::post('/quiz/{id}/delete', 'QuestionController@deletequiz'); 

    Route::post('/addnewqdata', 'QuestionController@addnewquestionView')->name('addnewqdata');
    Route::post('/addquestiondata', 'QuestionController@addQuestionData')->name('addquestiondata');
    Route::post('/addquestiondata_text', 'QuestionController@addQuestionDataText')->name('addquestiondata_text');
    Route::post('/question/{id}/update', 'QuestionController@updatequestion'); 
    Route::post('/question/{id}/delete', 'QuestionController@deleteQuestion'); 

});

