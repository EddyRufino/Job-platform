<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('vacancies', 'VacancyController');

Route::post('vacancies/{vacancy}/photos', 'PhotoController@store');
Route::post('vacantes/deleteimage', 'PhotoController@deleteimage');

Route::resource('candidate', 'CandidateController');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
