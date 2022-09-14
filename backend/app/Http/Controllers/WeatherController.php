<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WeatherController extends Controller
{
    use ResponseTrait;

    const GET_MESSAGE = 'Listed successfully';

    /**
     * @var App\Http\Services\WeatherService
     */
    private $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function getCities(Request $request): JsonResponse
    {
        try {
            $response = $this->weatherService->getCities($request->get('search'));
            $cities = [];
            foreach ($response['hits'] as $value) {
                $cities[] = $value['administrative'][0];
            }

            return $this->response(
                Response::HTTP_OK,
                self::GET_MESSAGE,
                $cities
            );
            
        } catch (Exception $exception) {
            return $this->response(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                $exception->getMessage()
            );
        }
    }

    /**
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function getWeather(Request $request): JsonResponse
    {
        try {
            $response = $this->weatherService->getWeather($request->get('city'));
          
            return $this->response(
                Response::HTTP_OK,
                self::GET_MESSAGE,
                $response
            );
            
        } catch (Exception $exception) {
            return $this->response(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                $exception->getMessage()
            );
        }
    }

    /**
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function getForecast(Request $request): JsonResponse
    {
        try {
            $response = $this->weatherService->getForecast(
                $request->get('latitude'),
                $request->get('longitude')
            );
          
            return $this->response(
                Response::HTTP_OK,
                self::GET_MESSAGE,
                $response
            );
            
        } catch (Exception $exception) {
            return $this->response(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                $exception->getMessage()
            );
        }
    }
}
