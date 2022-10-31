<?php

namespace App\Controllers;

class Home extends BaseController
{
    public $session=null;
    public function __construct()
    {
        helper('form');
        $this->session = \Config\Services::session();   
        
      
    }
    public function index()
    { 

        var_dump($this->session->get('user'));
        if($this->session->get('user')!= null){
            var_dump($this->session->get('user')); 
        return view('estructura/header').view('estructura/sidebar').view('index').view('estructura/endbody');
    }else{
        return view('estructura/header').view('error');
    }
    }
}
