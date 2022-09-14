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

    public function getCities(string $keyword)
    {
        return $this->weatherRepository->getCities($keyword);
    }
    
    public function getWeather(string $city)
    {
        return $this->weatherRepository->getWeather($city);
    }
    
    public function getForecast(float $latitude, float $longitude)
    {
        return $this->weatherRepository->getForecast(
            $latitude,
            $longitude
        );
    }
}
