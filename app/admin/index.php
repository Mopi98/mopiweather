<?php

function dd($d, $exit = true) {
    echo "<pre>" . print_r($d, 1) . "</pre>";
    if ($exit) {
        die();
    }
}


require_once 'core/define.php';
include_once 'core/request.php';
include_once 'core/rota.php';


Rota::add('home','home.index');
Rota::add('tempo', 'tempo.index');
Rota::add('executar','tempo.mostrarTempo');
Rota::exec(); 



?>

