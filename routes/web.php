<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('vacancies', 'VacancyController');

Route::post('vacancies/{vacancy}/photos', 'PhotoController@store');
Route::post('vacantes/deleteimage', 'PhotoController@deleteimage');

// Lo puse separado porque el la url me salia como si buera un buscador "name?name=namename"
Route::get('candidates/{candidate}', 'CandidateController@index')->name('candidates.index');
Route::post('candidates', 'CandidateController@store')->name('candidates.store');


Route::get('notifications', 'NotificationController')->name('notifications');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
