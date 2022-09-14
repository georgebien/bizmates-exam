<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface WeatherRepositoryInterface
{
    public function getCities(string $keyword);

    public function getWeather(string $city);
}
