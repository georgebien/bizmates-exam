<?php

namespace App\Services;

use App\Repositories\WeatherRepository;

class WeatherService
{   
    /**
     * @var App\Repositories\WeatherRepository
     */
    private $weatherRepository;

    public function __construct(WeatherRepository $weatherRepository)
    {
        $this->weatherRepository = $weatherRepository;
    }

    public function getWeather(string $city)
    {
        return $this->weatherRepository->getWeather($city);
    }
    
    public function getForecast(string $city)
    {
        return $this->weatherRepository->getForecast($city);
    }

    public function getPlaces(string $city)
    {
        return $this->weatherRepository->getPlaces($city);
    }
}
