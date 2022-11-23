<?php

include_once 'core/Http.php';



class TempoModel {

    private const BASE_URL1 = "http://api.openweathermap.org/geo/1.0/direct?";
    private const BASE_URL2 = "api.openweathermap.org/data/2.5/forecast?";

    public static function geocodificador($cidade) {
        $url_geo = self:: BASE_URL1.'q='.$cidade.'&limit=5&lang=pt_br&appid=dee164c2d7b5ddc5cf2cb3197822f43c';
        $retorno_geo = Http::send($url_geo);
        $array_geo = json_decode($retorno_geo,true); 
        return isset($array_geo[0]['lat']) ? [$array_geo[0]['lat'],$array_geo[0]['lon']] : [] ;    
    }

    public static function localizarTempo($lat,$lon) {
        $url_temp = self:: BASE_URL2.'lat='.$lat.'&lon='.$lon.'&lang=pt_br&appid=dee164c2d7b5ddc5cf2cb3197822f43c';
        echo Http::send($url_temp);
        

    }

}