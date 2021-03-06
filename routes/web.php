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

// Teachers
Route::post('/teachers', 'TeacherController@create');
Route::get('/teachers/{id}', 'TeacherController@view');
Route::get('/teachers', 'TeacherController@all');
Route::get('/teachers/{id}/votes', 'VoteController@view');
Route::post('/teachers/{id}/votes', 'VoteController@create');

// Institutions
Route::post('/institutions', 'InstitutionController@create');
Route::get('/institutions', 'InstitutionController@all');
Route::get('/institutions/{id}', 'InstitutionController@view');
Route::get('/institutions/{id}/teachers', 'InstitutionController@teachers');
