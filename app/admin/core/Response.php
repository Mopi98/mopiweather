<?php

class Response {

    public static function json($dados) {
        header('Content-Type: application/json');
        echo json_encode($dados, JSON_UNESCAPED_UNICODE);
    }

}