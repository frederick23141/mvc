<?php 

namespace Lib;
class Route {
    private static $routes = [];

    //agregar rutas get a routes
    public static function get($uri, $callback){
        self::$routes['GET'][$uri] = $callback;      
    }

    //agregar rutas post a routes como es static no usamos $this-> sino self::
    public static function post($uri, $callback){
    self::$routes['POST'][$uri] = $callback;
    }

}

