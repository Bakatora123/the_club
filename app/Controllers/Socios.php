<?php

namespace App\Controllers;

use App\Models\SociosM;

class Socios extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        $SociosM = new SociosM();
        $socios = $SociosM->findAll();
        $socios = array('socios' => $socios);

        return view('estructura/header') . view('estructura/sidebar') . view('socios', $socios) . view('estructura/endbody');;
    }
    public function addSocio()
    {
        return view('estructura/header') . view('estructura/sidebar') . view('add_socio') . view('estructura/endbody');
    }
    public function add()
    {

        $SociosM = new SociosM();
        $request = \Config\Services::request();
        $socio = array(
            'nombre' => $request->getPostGet('nombre'),
            'apellido' => $request->getPostGet('apellido'),
            'documento' => $request->getPostGet('documento'),
            'celular' => $request->getPostGet('celular')
        );
        if ($SociosM->insert($socio) === false) {
            var_dump($SociosM->errors());
            header("Location:" . base_url() . "/Socios?etd=false");
            exit();
        } else {
            header("Location:" . base_url() . "/Socios?etd=true");
            exit();
        } 
    }
    public function editSocio()
    {
        $SociosM = new SociosM();
        $socio = $SociosM->find($_GET['id_socio']);
        return view('estructura/header') . view('estructura/sidebar') . view('edit_socio', $socio) . view('estructura/endbody');
    }
    public function edit()
    {
        $SociosM = new SociosM();
        $request = \Config\Services::request();
        $socio = array(
            'Id_socio' => $request->getPostGet('Id_socio'),
            'nombre' => $request->getPostGet('nombre'),
            'apellido' => $request->getPostGet('apellido'),
            'documento' => $request->getPostGet('documento'),
            'celular' => $request->getPostGet('celular')
        );

        if ($SociosM->update($request->getPostGet('Id_socio'), $socio) === false) {
            header("Location:" . base_url() . "/Socios?etd=false");
            exit();
        } else {
            header("Location:" . base_url() . "/Socios?etd=true");
            exit();
        }
    }
    public function delete()
    {
        $SociosM = new SociosM();
        $request = \Config\Services::request();
        if ($SociosM->delete($request->getPostGet('Id_socio')) === false) {
            header("Location:" . base_url() . "/Socios?etd=false");
            exit();
        } else {
            header("Location:" . base_url() . "/Socios?etd=true");
            exit();
        }
    }
}
