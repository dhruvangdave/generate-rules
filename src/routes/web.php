<?php

\Illuminate\Support\Facades\Route::group(['namespace' => 'Dhruvang\GenerateRules\Http\Controllers'], function () {
    \Illuminate\Support\Facades\Route::get('dashboard', 'GenerateRulesController@index');
});
