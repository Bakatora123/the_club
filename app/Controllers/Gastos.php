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
        $GastosM = new GastosM();
        $Gastos = $GastosM->findAll();
        $Gastos = array('Gastos' => $Gastos);
        return view('estructura/header').view('estructura/sidebar').view('gastos',$Gastos).view('estructura/endbody');
    }

    public function addGasto()
    {
        return view('estructura/header').view('estructura/sidebar').view('add_gasto').view('estructura/endbody');
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
        $GastosM = new GastosM();
        $gasto = $GastosM->find($_GET['id_gasto']);
        return view('estructura/header') . view('estructura/sidebar') . view('edit_gasto', $gasto) . view('estructura/endbody');
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
