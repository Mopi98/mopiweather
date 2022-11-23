<?php

include_once 'core/View.php';
include_once MODEL.'TempoModel.php';
include_once 'core/Response.php';

class Tempo {

public static function index() {
    
    View::visualizar('tempo');
    
}

public static function mostrarTempo() {
    $cidade = Request::post("cidade");
    $geodados = TempoModel::geocodificador($cidade);
    echo TempoModel::localizarTempo($geodados[0],$geodados[1]);

    }
    
}
