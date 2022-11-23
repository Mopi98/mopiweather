<?php

include_once 'core/View.php';
include_once 'core/Response.php';

class Home {


    public static function index() {
       View::visualizar('home');
    }

}
