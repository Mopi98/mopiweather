<?php

class Http {
    
    public static function send($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);
        if( ! $response = curl_exec($curl)){
            trigger_error(curl_error($curl));
        }
        curl_close($curl);
        return $response;

    }
}