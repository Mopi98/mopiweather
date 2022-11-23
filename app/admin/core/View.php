<?php


class View {
    public static function visualizar($pagina) {
        include_once 'src/view/pages/'.$pagina.'/index.php';
        
    }

}