<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController');

Auth::routes(['verify' => true]);

Route::get('/vacancies/search', 'VacancyController@result')->name('vacancies.result'); // Si lo pongo abajo de 'vacancies' me sale 404 - ten en cuenta
Route::post('/vacancies/search', 'VacancyController@search')->name('vacancies.search');
Route::resource('vacancies', 'VacancyController');



Route::post('vacancies/{vacancy}/photos', 'PhotoController@store');
Route::post('vacantes/deleteimage', 'PhotoController@deleteimage');

// Cambiar el estado de la vacante vía axios
Route::post('vacancies/{vacancy}', 'VacancyController@state')->name('vacancies.state');

// Lo puse separado porque el la url me salia como si buera un buscador "name?name=namename"
Route::get('candidates/{candidate}', 'CandidateController@index')->name('candidates.index');
Route::post('candidates', 'CandidateController@store')->name('candidates.store');


Route::get('notifications', 'NotificationController')->name('notifications');


Route::get('categories/{category}', 'CategoryController@show')->name('categories.show');


Route::get('/home', 'HomeController@index')->name('home');
