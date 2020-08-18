<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('vacantes', 'VacancyController');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
