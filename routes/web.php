<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/registrasi','RegistrasiController@registrasitampil');

Route::get('/home', function(){return view('view_home');});

Route::get('/login','LoginController@logintampil');

Route::get('/menu','MenuController@menutampil');