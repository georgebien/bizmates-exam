<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/get-cities',
    [
        WeatherController::class, 
        'getCities'
    ]
);

Route::get(
    '/get-weather',
    [
        WeatherController::class, 
        'getWeather'
    ]
);

Route::get(
    '/get-forecast',
    [
        WeatherController::class, 
        'getForecast'
    ]
);
