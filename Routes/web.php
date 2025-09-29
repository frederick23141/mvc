<?php 

//autoload 
require_once '../autolader.php';

use Lib\Route;



Route::get('/',function(){
    echo "hola desde la pagina principal";
});

Route::get('/contact',function(){
    echo "hola desde la pagina contacto";
});