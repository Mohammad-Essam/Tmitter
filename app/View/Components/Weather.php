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
    public $country_data;
    public function __construct()
    {
        //first get the user ip
        $ip = request()->ip();
        if($ip == '127.0.0.1')
        {
            //random ip that reads the weather of egypt
            //because the api doesn't work on localhost
            $ip = '41.35.145.12';
        }
        //then get the country of the user and the latitude and longitude
        $this->country_data = Http::get("http://ip-api.com/json/$ip");
        $lat = $this->country_data->json()['lat'];
        $lon = $this->country_data->json()['lon'];
        $response = Http::get("https://api.open-meteo.com/v1/forecast?latitude=$lat&longitude=$lon&current_weather=true&hourly=temperature_2m,relativehumidity_2m,windspeed_10m");
        $this->temperature = $response->json()['current_weather']['temperature'];
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
