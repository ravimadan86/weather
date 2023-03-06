<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Redirect;

class HomeController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        $appid = env('WEATHER_APP_ID');
        $openweathermapUrl = env('OPENWEATHERMAP_URL');
        $city = $request->get('city');
        try {
            $forecast = [];

            if($city) {
                
                $url = $openweathermapUrl."/weather?q=".$city."&units=metric&appid=".$appid;
                $client = new \GuzzleHttp\Client();
                $res = $client->get($url);
                if ($res->getStatusCode() == 200) {
                  $j = $res->getBody();
                  $forecast = json_decode($j);
                }
            }

            return view('home', ["forecast" => $forecast]);
        } catch ( \Exception $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $error = json_decode($responseBodyAsString);
            return view('home', ["forecast" => [], 'exceptionMessage' => $error->message ]);
        }
        
    }

    public function next24(Request $request)
    {
        $appid = env('WEATHER_APP_ID');
        $openweathermapUrl = env('OPENWEATHERMAP_URL');
        $city = $request->get('city');
        try {
            $forecast = [];

            if($city) {
                
                $url = $openweathermapUrl."/forecast?q=".$city."&units=metric&appid=".$appid;
                $client = new \GuzzleHttp\Client();
                $res = $client->get($url);
                if ($res->getStatusCode() == 200) {
                  $j = $res->getBody();
                  $forecast = json_decode($j);
                }
            }
            // echo "<pre>";
            // print_r($forecast);
            // die;
            return view('next24', ["forecast" => $forecast, 'time24' => strtotime("+1 day") ]);
        } catch ( \Exception $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $error = json_decode($responseBodyAsString);
            return view('next24', ["forecast" => [], 'exceptionMessage' => $error->message ]);
        }
        
    }

    public function next5days(Request $request)
    {
        $appid = env('WEATHER_APP_ID');
        $openweathermapUrl = env('OPENWEATHERMAP_URL');
        $city = $request->get('city');
        try {
            $forecast = [];

            if($city) {
                
                $url = $openweathermapUrl."/forecast?q=".$city."&units=metric&appid=".$appid;
                $client = new \GuzzleHttp\Client();
                $res = $client->get($url);
                if ($res->getStatusCode() == 200) {
                  $j = $res->getBody();
                  $forecast = json_decode($j);
                }
            }
            return view('next5days', ["forecast" => $forecast]);
        } catch ( \Exception $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $error = json_decode($responseBodyAsString);
            return view('next5days', ["forecast" => [], 'exceptionMessage' => $error->message ]);
        }
        
    }
}
