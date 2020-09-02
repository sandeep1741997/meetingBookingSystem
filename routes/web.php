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
Route::get('/', function () {
    return view('welcome');
});

Route::view('/home','home');
Route::get('/register','Profile@Signup');
Route::post('/registered','Profile@registered');
 
Route::get('/login','Profile@login');
Route::post('/logedin','Profile@logedin');

Route::get('/Meeting','Profile@meeting');
Route::post('/meetingadded','Profile@createmeeting');

Route::get('/editmeeting/{id}','Profile@edit');
Route::post('editedmeeting','Profile@edited');

Route::get('/deletemeeting/{id}','Profile@delete');
