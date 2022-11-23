<?php

class Rota {

    private static $rotas = [];

    public static function add($url, $acao) {
        $ex = explode('/{', $url);
        $parametros = [];
        if (count($ex) > 1) {
            $url = $ex[0];
            for ($index = 1; $index < count($ex); $index++) {
                $removeChave = str_replace('}', '', $ex[$index]);
                $parametros[$index - 1] = $removeChave;
            }
        }
        $base = BASE_URL == "/" ? "" : BASE_URL;
        self::$rotas[$base . $url] = ['url' => $base . $url, 'acao' => $acao, 'param' => $parametros];
    }

    public static function exec() {
        $url = $_SERVER['REQUEST_URI'];
        $r = self::getRota($url);
        if ($r) {
            $classe = ucfirst(explode('.', $r['acao'])[0]);
            $funcao = explode('.', $r['acao'])[1];
            $ex = explode($r['url'], $url);
            
            if (isset($ex[1])) {
                $url_parametros = explode('/', $ex[1]);
                array_shift($url_parametros);
                
                $pp = [];
                if (isset($url_parametros)) {
                    foreach ($r['param'] as $k => $p) {
                        $pp[$p] = isset($url_parametros[$k]) ? urldecode($url_parametros[$k]) : null;
                    }
                }
                require_once CONTROLLER . $classe . '.php';
                $c = new $classe();
                Request::set($pp);
                $c->$funcao();
            } else {
                $c = new $classe();
                $c->$funcao();
            }
        } else {

            $ex = explode(BASE_URL, $url);

            $classe_funcao = explode('/', $ex[1]);
            $classe = ucfirst($classe_funcao[0]);
            if (is_file(CONTROLLER . $classe . '.php')) {
                require_once CONTROLLER . $classe . '.php';
                $c = new $classe();
                $funcao = "index";
                if(isset($classe_funcao[1])){
                    $funcao = $classe_funcao[1];
                }
                $c->$funcao();
            } else { 
                include_once PAGINA_404;
                return;
            }
        }
    }

    public static function getRotas() {
        return self::$rotas;
    }

    private static function getRota($url) {

        $rota = isset(self::$rotas[$url]) ? self::$rotas[$url] : null;
        while (!$rota) {
            $explodeUrl = explode('/', $url);
            array_pop($explodeUrl);
            $url = implode('/', $explodeUrl);

            if (count($explodeUrl) == 0) {
                return null;
            }
            $rota = isset(self::$rotas[$url]) ? self::$rotas[$url] : null;
        }
        return $rota;
    }

    
    
    

}


