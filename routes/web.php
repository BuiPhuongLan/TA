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

// Route::get('admin_home/show_score', function () {
//     return view('admins.showScoreIndivitual');
// });

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
    //Setup Quesion
    Route::get('/setup','QuestionController@setup')->name('admin.setup');
    
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

    //Edit Student
    Route::get('/edit_student','AdminHomeController@edit_student')->name('edit_student');
    Route::get('/addgroup','GroupController@create')->name('create');
    Route::post('/add/groups', 'GroupController@addAndUpdateGroups')->name('add_group');

    Route::get('/add_student','AdminHomeController@add_student')->name('add_student');
    Route::post('/addinfor_student', 'AdminHomeController@addInforStudent')->name('addInforStudent');
    Route::get('/delete_student','AdminHomeController@delete_student')->name('delete_student');
    Route::post('/deleteinfor_student', 'AdminHomeController@deleteInforStudent')->name('deleteInforStudent');

    //View result
    Route::get('/view_result','AdminHomeController@viewResult')->name('view_result');
    Route::get('/view_score','AdminHomeController@viewScoreIndivitual')->name('view_score');
    Route::post('/show_score','AdminHomeController@showScoreIndivitual')->name('show_score');
    Route::get('/view_score_group','AdminHomeController@viewScoreGroup')->name('view_score_group');
    Route::post('/show_score_group','AdminHomeController@showScoreGroup')->name('show_score_group');

});

