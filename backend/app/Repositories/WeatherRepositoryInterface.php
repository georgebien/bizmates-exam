<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface WeatherRepositoryInterface
{
    public function getWeather(string $city);
    public function getForecast(string $city);
}
