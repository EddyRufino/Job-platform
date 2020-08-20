<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('vacantes', 'VacancyController');
Route::post('vacantes/image', 'VacancyController@image')->name('vacantes.image');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
