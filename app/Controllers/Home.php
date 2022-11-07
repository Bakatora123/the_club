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
                'apellido'=>$this->session->get('apellido'),
                'rol'=>$this->session->get('rol'),
                'user'=> $this->session->get('user'),
                'documento'=>$this->session->get('documento'),
                  ];
             
        return view('estructura/header').view('estructura/sidebar',$user).view('index').view('estructura/endbody');
    }else{
        return view('estructura/header').view('error');
    }
    }
}
