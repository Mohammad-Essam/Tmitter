<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class Weather extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $city;
    public $temperature;
    public $location_data;
    public function __construct()
    {

        $client = new \GuzzleHttp\Client();
        //first get the user ip
        $ip = $_SERVER['REMOTE_ADDR'];
        if($ip == '127.0.0.1')
        {
            //random ip that reads the weather of egypt
            //because the api doesn't work on localhost
            $ip = '41.35.145.12';
        }
        //then get the country of the user and the latitude and longitude
        $res = $client->request('GET', "http://ip-api.com/json/$ip");
        $this->location_data = json_decode($res->getBody()->getContents());

        $lat = $this->location_data->lat;
        $lon = $this->location_data->lon;

        $response = $client->request('GET', "https://api.open-meteo.com/v1/forecast?latitude=$lat&longitude=$lon&current_weather=true&hourly=temperature_2m,relativehumidity_2m,windspeed_10m");
        $responseJson =  json_decode($response->getBody()->getContents());
        $this->temperature = $responseJson->current_weather->temperature;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.weather');
    }
}
