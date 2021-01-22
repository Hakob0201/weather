<?php

namespace App\Http\Controllers;

use App\WeathModel;
use Illuminate\Http\Request;
use App\Http\Controllers\DateTime;

class Weather extends Controller
{
    public function Weather()
    {

//        $url = json_decode($url);
//        dd($url->list);


        return view('welcome');
    }

    public function JsonWeath(Request $request)
    {
        $url = file_get_contents("http://api.openweathermap.org/data/2.5/group?id=616052,174875&appid=bf65d8b174418831a16055a19f50144f");
        WeathModel::query()->truncate();

        foreach (json_decode($url)->list as $key => $value)
        {
            $WeathModel = new WeathModel();
            $WeathModel ->time = $value->sys->timezone;
            $WeathModel ->name = $value->name;
            $WeathModel ->latitude = $value->coord->lat;
            $WeathModel ->longitude = $value->coord->lon;
            $WeathModel ->temp_celsius = $value->main->temp;
            $WeathModel ->pressure = $value->main->pressure;
            $WeathModel ->humidity = $value->main->humidity;
            $WeathModel ->temp_min = $value->main->temp_min;
            $WeathModel ->temp_max = $value->main->temp_max;
            $WeathModel->save();
        }

        $data = WeathModel::get();
        return response()->json([$data]);
    }
}
