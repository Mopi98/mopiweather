<?php

class Request {
    private static $params;

    public static function set(array $params)
    {
        self::$params = $params;
    }

    public static function get($params = null)
    {
        if ($params) {
            return isset(self::$params[$params]) ? self::$params[$params] : null;
        } else {
            return self::$params;
        }
    }

    public static function file($file = null)
    {
        return isset($_FILES[$file]) ? $_FILES[$file] : $_FILES;
    }

    public static function post($p = null)
    {
        if ($p) {
            if (self::temConteudoNoPOST()) {
                return $_POST[$p];
            } else if (file_get_contents('php://input')) {
                return json_decode(file_get_contents('php://input'), TRUE)[$p];
            }
        }
        if (self::temConteudoNoPOST()) {
            return $_POST;
        }
        return json_decode(file_get_contents('php://input'), TRUE);
    }

    private static function temConteudoNoPOST()
    {
        return count($_POST) > 0;
    }    
}

