<?php

namespace App\Controllers;

use App\Models\PagosM;
use App\Models\UsuariosM;
use App\Models\SociosM;

class Pagos extends BaseController
{
    public $session = null;
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
        if ($this->session->get('user') != null) {

            return view('estructura/header') . view('estructura/sidebar') . view('pagos', $pagos) . view('estructura/endbody');
        } else {
            return view('estructura/header') . view('error');
        }
    }
    public function addPagos()
    {
        $UsuariosM = new UsuariosM();
        $SociosM = new SociosM();
        if ($this->session->get('user') != null) {
            $user = [
                'nombre' => $this->session->get('nombre'),
                'rol' => $this->session->get('rol')
            ];
            $encargados = $UsuariosM->where('rol', 2)->find();
            $socios = $SociosM->findAll();

            $options = array(
                'options' => $encargados,
                'socios' => $socios
            );
            return view('estructura/header') . view('estructura/sidebar', $user) . view('add_pago', $options) . view('estructura/endbody');
        } else {
            return view('estructura/header') . view('error');
        }
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




        $UsuariosM = new UsuariosM();
        $SociosM = new SociosM();
        $PagosM = new PagosM();
        $pago = $PagosM->find($_GET['id_pago']);
        if ($this->session->get('user') != null) {
            $user = [
                'nombre' => $this->session->get('nombre'),
                'rol' => $this->session->get('rol')
            ];
            $encargados = $UsuariosM->where('rol', 2)->find();
            $socios = $SociosM->findAll();

            $options = array(
                'options' => $encargados,
                'socios' => $socios,
                'pago' =>$pago
            );

            return view('estructura/header') . view('estructura/sidebar',$user) . view('edit_pago', $options) . view('estructura/endbody');
        } else {
            return view('estructura/header') . view('error');
        }
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
