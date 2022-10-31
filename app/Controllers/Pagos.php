<?php

namespace App\Controllers;

use App\Models\PagosM;

class Pagos extends BaseController
{public $session = null;
    public function __construct()
    {
        helper('form');
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $PagosM = new PagosM();
        $pagos = $PagosM->findAll();
        $pagos = array('pagos' => $pagos);
        return view('estructura/header') . view('estructura/sidebar') . view('pagos', $pagos) . view('estructura/endbody');;
    }
    public function addPagos()
    {
        return view('estructura/header') . view('estructura/sidebar') . view('add_pago') . view('estructura/endbody');;
    }
    public function add()
    {
        $PagosM = new PagosM();
        $request = \Config\Services::request();
        $pago = array(
            'doc_encargado' => $request->getPostGet('doc_encargado'),
            'doc_socio' => $request->getPostGet('doc_socio'),
            'monto' => $request->getPostGet('monto'),
            'fecha' => $request->getPostGet('fecha')
        );
        if ($PagosM->insert($pago) === false) {
            var_dump($PagosM->errors());
            header("Location:" . base_url() . "/Pagos?etd=false");
            exit();
        } else {
            header("Location:" . base_url() . "/Pagos?etd=true");
            exit();
        }
    }
    public function editPagos()
    {
        $PagosM = new PagosM();
        $pago = $PagosM->find($_GET['id_pago']);
        return view('estructura/header') . view('estructura/sidebar') . view('edit_pago', $pago) . view('estructura/endbody');;
    }
    public function edit()
    {
        $PagosM = new PagosM();
        $request = \Config\Services::request();
        $pago = array(
            'id_pago' => $request->getPostGet('id_pago'),
            'doc_encargado' => $request->getPostGet('doc_encargado'),
            'doc_socio' => $request->getPostGet('doc_socio'),
            'monto' => $request->getPostGet('monto'),
            'fecha' => $request->getPostGet('fecha')
        );

        if ($PagosM->update($request->getPostGet('id_pago'), $pago) === false) {
            header("Location:" . base_url() . "/Pagos?etd=false");
            exit();
        } else {
            header("Location:" . base_url() . "/Pagos?etd=true");
            exit();
        }
    }
    public function delete()
    {
        $PagosM = new PagosM();
        $request = \Config\Services::request();
        if ($PagosM->delete($request->getPostGet('id_pago')) === false) {
            header("Location:" . base_url() . "/Pagos?etd=false");
            exit();
        } else {
            header("Location:" . base_url() . "/Pagos?etd=true");
            exit();
        }
    }
}
