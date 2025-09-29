<?php 

//autoload 
require_once '../autolader.php';

use Lib\Route;
use App\Controllers\HomeController;


Route::get('/',[HomeController::class, 'index']);

Route::get('/contact',function(){
    echo "hola desde la pagina contacto";
});

Route::get('/course/:slug', function($slug){
     echo "hola desde la pagina cursos, el curso es ".$slug;
});

Route::dispatch();