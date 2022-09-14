<?php

namespace App\Repositories;

use Exception;
use GuzzleHttp\Client;

class WeatherRepository implements WeatherRepositoryInterface
{   
    const API_KEY = 'c51d061f86891a4f4fc0c3f26d61bade';
    const API_KEY_TWO = '20571ab45c74dc2a1897b60c5b8047a1';
    const API_KEY_FOURSQUARE = 'fsq3lXAxp4pP4ixPfv+5OrZ1ULEZxJn7odiGqQ4+xHgzqSA=';

    /**
     * @var GuzzleHttp\Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
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
    
    public function getForecast(string $city)
    {
        $url = sprintf(
            'https://api.openweathermap.org/data/2.5/forecast/daily?q=%s&units=metric&appid=%s',
            $city,
            self::API_KEY_TWO
        );

        try {
            $response = $this->client->get($url);

            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
    
    public function getPlaces(string $city)
    {
        $url = sprintf(
            'https://api.foursquare.com/v3/places/search?query=%s&limit=6',
            strtolower($city),
            self::API_KEY_TWO
        );

        try {
            $response = $this->client->get(
                'https://api.foursquare.com/v2/venues/search?client_id=KOFV21OFKFTTND2YAFWFC1SEYNYR2ECXLAY32NKYBXX35FPZ&client_secret=OVTJIWEPFCG1T1YTHV0MI0KZWWCO1A3EFNQLEW0QBFO2OV2D&oauth_token=fsq3lXAxp4pP4ixPfv%2B5OrZ1ULEZxJn7odiGqQ4%2BxHgzqSA%3D',
                [
                    'headers' => [
                      'Authorization' => self::API_KEY_FOURSQUARE,
                      'accept' => 'application/json',
                    ]
                ]
            );

            var_dump(json_decode($response->getBody()->getContents(), true));
            exit;

            return json_decode($response->getBody()->getContents(), true);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
