<?php 

//autoload 
require_once '../autolader.php';

use Lib\Route;


Route::get('/',function(){
    return [
        'title' => 'Home',
        'content' => 'Hola desde la pagina de inicio'
    ];
});

Route::get('/contact',function(){
    echo "hola desde la pagina contacto";
});

Route::get('/course/:slug', function($slug){
     echo "hola desde la pagina cursos, el curso es ".$slug;
});

Route::dispatch();