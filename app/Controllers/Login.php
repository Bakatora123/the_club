<?php

namespace App\Controllers;

use App\Models\UsuariosM;

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
            header("Location:" . base_url() . "/Home");
            exit();
        } else {
            header("Location:" . base_url() . "/Login");
            exit();
        }
    }
    public function cerrar()
    {
        $this->session->destroy();
        header("Location:" . base_url() . "/Login?est=true");
        exit();
    }
}
