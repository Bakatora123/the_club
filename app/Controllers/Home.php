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
        if($this->session->get('user')!= null){
            $user=[
                'nombre'=>$this->session->get('nombre'),
                'apellido'=>$this->session->get('apellido')
             ];
             
        return view('estructura/header').view('estructura/sidebar').view('index',$user).view('estructura/endbody');
    }else{
        return view('estructura/header').view('error');
    }
    }
}
