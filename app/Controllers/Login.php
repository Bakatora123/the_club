<?php

namespace App\Controllers;

use App\Models\UsuariosM;
use Config\Validation;

class Login extends BaseController
{
    public $session = null;
    public function __construct()
    {
        helper('form');
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        return view('estructura/header') . view('login') . view('estructura/endbody');
    }
    public function aute()
    {
        //    $validated = service('validation');
        //    $validated->setRules([
        //     'name' => 'required',
        //     'pass' => 'required'
        //    ]);

        //   if(!$validated->withRequest($this->request)->run()){
        //        return redirect()->back->withInput()->with('errors',$validated->getErrors());

        //   };
        //   exit();



        $UsuariosM = new UsuariosM;
        $request = \Config\Services::request();
        $login = array(
            'name' => $request->getPostGet('name'),
            'pass' => $request->getPostGet('pass'),

        );


        $buscar = [
            'pass' => $request->getPostGet('pass'),
            'user' => $request->getPostGet('name')
        ];
        if ($UsuariosM->where($buscar)->first() == true) {
            $login =  $UsuariosM->where($buscar)->first();
            $this->session->set($login);
            header("Location:".base_url()."/Home");
            exit();
        } else {
            header("Location:".base_url()."/?est=false");
            exit();
        }
    }
    public function cerrar()
    {
        $this->session->destroy();
        header("Location:".base_url()."/");
        exit();
    }
}
