<?php 

namespace App\Controllers;

use App\Models\Contact;

class HomeController extends Controller{
    public function index(){

        $contactModel = new Contact();

        return $this->view('home',[
            'title' => 'Home',
            'content' => 'Esta es la pagina de homee'
        ]);
    }

}