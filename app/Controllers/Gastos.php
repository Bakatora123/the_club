<?php

namespace App\Controllers;

use App\Models\GastosM;

class Gastos extends BaseController
{public $session = null;
    
    public function __construct()
    {
        helper('form');
        $this->session = \Config\Services::session();
       

    }
    public function index()
    {
        //session datos
        $log=[
            'rol'=>$this->session->get('rol'),
            'nombre'=>$this->session->get('nombre'),
            'apellido'=>$this->session->get('apellido'),
            'usuario'=>$this->session->get('usuario')
        ];
        //Fin datos session
        $GastosM = new GastosM();
        $Gastos = $GastosM->findAll();
        $Gastos = array('Gastos' => $Gastos);
 if($this->session->get('user')!= null){
            var_dump($this->session->get('user'));
        return view('estructura/header').view('estructura/sidebar', $log).view('gastos',$Gastos).view('estructura/endbody');
    }else{
        return view('estructura/header') . view('error');
    }
    }

    public function addGasto()
    {
        //session datos
        $log=[
            'rol'=>$this->session->get('rol'),
            'nombre'=>$this->session->get('nombre'),
            'apellido'=>$this->session->get('apellido'),
            'usuario'=>$this->session->get('usuario')
        ];
        //Fin datos session

         if($this->session->get('user')!= null){
            var_dump($this->session->get('user'));
        return view('estructura/header').view('estructura/sidebar',$log).view('add_gasto').view('estructura/endbody');
    }else{
        return view('estructura/header') . view('error');
    }
    }
    public function add()
    {
        $GastosM = new GastosM();
        $request = \Config\Services::request();
        $gasto = array(
            'monto' => $request->getPostGet('monto'),
            'fecha' => $request->getPostGet('fecha'),
            'detalles' => $request->getPostGet('detalles')
        );
        if ($GastosM->insert($gasto) === false) {
            var_dump($GastosM->errors());
            header("Location:" . base_url() . "/Gastos?est=false");
            exit();
        } else {
            header("Location:" . base_url() . "/Gastos?est=true");
            exit();
        }
    }
    public function editGasto()
    {
       //session datos
       $log=[
        'rol'=>$this->session->get('rol'),
        'nombre'=>$this->session->get('nombre'),
        'apellido'=>$this->session->get('apellido'),
        'usuario'=>$this->session->get('usuario')
    ];
    //Fin datos session

        $GastosM = new GastosM();
        $gasto = $GastosM->find($_GET['id_gasto']);
 if($this->session->get('user')!= null){
            var_dump($this->session->get('user'));
        return view('estructura/header') . view('estructura/sidebar',$log) . view('edit_gasto', $gasto) . view('estructura/endbody');
    }else{
        return view('estructura/header') . view('error');
    }
    }
    public function edit()
    {
        $GastosM = new GastosM();
        $request = \Config\Services::request();
        $gasto = array(
            'monto' => $request->getPostGet('monto'),
            'fecha' => $request->getPostGet('fecha'),
            'detalles' => $request->getPostGet('detalles')
        );

        if ($GastosM->update($request->getPostGet('id_gasto'), $gasto) === false) {
            header("Location:" . base_url() . "/Gastos?est=false");
            exit();
        } else {
            var_dump($gasto);
            header("Location:" . base_url() . "/Gastos?est=true");
            exit();
        }
    }
    public function delete()
    {
        $GastosM = new GastosM();
        $request = \Config\Services::request();
        if ($GastosM->delete($request->getPostGet('id_gasto')) === false) {
            header("Location:" . base_url() . "/Gastos?est=false");
            exit();
        } else {
            header("Location:" . base_url() . "/Gastos?est=true");
            exit();
        }
    }
}
