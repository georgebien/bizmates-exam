<?php

namespace App\Repositories;

use Exception;
use GuzzleHttp\Client;

class WeatherRepository implements WeatherRepositoryInterface
{   
    const API_KEY = 'c51d061f86891a4f4fc0c3f26d61bade';

    /**
     * @var GuzzleHttp\Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getCities(string $keyword)
    {
        $url = sprintf(
            'https://places-dsn.algolia.net/1/places/query?query=%s&language=en&type=city',
            strtolower($keyword)
        );

        try {
            $response = $this->client->get($url);

            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
    
    public function getWeather(string $city)
    {
        $url = sprintf(
            'https://api.openweathermap.org/data/2.5/weather?q=%s&units=metric&appid=%s',
            strtolower($city),
            self::API_KEY
        );

        try {
            $response = $this->client->get($url);

            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
    
    public function getForecast(float $latitude, float $longitude)
    {
        $url = sprintf(
            'https://api.openweathermap.org/data/2.5/forecast?lat=%d&lon=%d&appid=%s',
            $latitude,
            $longitude,
            self::API_KEY
        );

        try {
            $response = $this->client->get($url);

            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
