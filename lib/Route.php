<?php 

namespace Lib;

use App\Controllers\HomeController;
class Route {
    private static $routes = [];

    //agregar rutas get a routes
    public static function get($uri, $callback){
        $uri = trim($uri,'/');
        self::$routes['GET'][$uri] = $callback;      
    }

    //agregar rutas post a routes como es static no usamos $this-> sino self::
    public static function post($uri, $callback){
        $uri = trim($uri,'/');
    self::$routes['POST'][$uri] = $callback;
    }

    public static function dispatch(){
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri,'/');
        //echo $uri;

        $method = $_SERVER['REQUEST_METHOD'];
        
        foreach (self::$routes[$method] as $route => $callback){


            if(strpos($route, ':') !== false)
            {
                $route = preg_replace('#:[a-zA-Z]+#','([a-zA-Z]+)',$route);          
            }

            if(preg_match("#^$route$#",$uri,$matches)){

                $params = array_slice($matches,1);

                if(is_callable($callback)){
                    $response = $callback(...$params );
                }

                if(is_array($callback)){
                    $controller = new $callback[0];
                    $response = $controller->{$callback[1]}(...$params);
                }

                if(is_array($response) || is_object($response)){
                    echo json_encode($response);
                }else{
                    echo $response;
                }

                return;
            }
          
        }
        echo '404 not found';
    }

}

