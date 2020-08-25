<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('vacancies', 'VacancyController');

Route::post('vacantes/{image}', 'PhotoController@store');
Route::post('vacantes/deleteimage', 'PhotoController@deleteimage');

// Route::post('vacantes/{image}', 'VacancyController@image');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
