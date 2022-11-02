<?php

namespace App\Controllers;

use App\Models\UtileriaM;

class Utileria extends BaseController
{public $session = null;
    public function __construct()
    {
        helper('form');
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $UtileriaM = new UtileriaM;
        $articulos = $UtileriaM->findAll();
        $articulos = array('articulos' => $articulos);
 if($this->session->get('user')!= null){
            
        return view('estructura/header') . view('estructura/sidebar') . view('utileria', $articulos) . view('estructura/endbody');
}else{
        return view('estructura/header') . view('error');
    }
    
    }

    public function addArticulo()
    {

        $options = [
            '0'  => '--------',
            '1'  => 'Locker 1',
            '2'    => 'Locker 2',
        ];
        $options = array('options' => $options);
 if($this->session->get('user')!= null){
            
        return view('estructura/header') . view('estructura/sidebar') . view('add_articulo', $options) . view('estructura/endbody');
       }else{
        return view('estructura/header') . view('error');
    }
     
    }

    public function add()
    {

        $UtileriaM = new UtileriaM;
        $request = \Config\Services::request();
        $articulo = array(
            'nombre' => $request->getPostGet('nombre'),
            'cantidad' => $request->getPostGet('cantidad'),
            'locker' => $request->getPostGet('locker'),
            'detalle' => $request->getPostGet('detalle')
        );
        if ($UtileriaM->insert($articulo) === false) {
            var_dump($UtileriaM->errors());
            header("Location:" . base_url() . "/Utileria?est=false");
            exit();
        } else {
            header("Location:" . base_url() . "/Utileria?est=true");
            exit();
        }
    }
    public function editArticulo()
    {

        $UtileriaM = new UtileriaM;
        $articulo = $UtileriaM->find($_GET['id_articulo']);
        $options = [
            '0'  => '--------',
            '1'  => 'Locker 1',
            '2'    => 'Locker 2',
        ];
        $medios = array(
            'options' => $options,
            'articulo' => $articulo
        );

        $data['options'] = array(
            '0'  => '--------',
            '1'  => 'Locker 1',
            '2'    => 'Locker 2'
        );

 if($this->session->get('user')!= null){
            
        return view('estructura/header') . view('estructura/sidebar') . view('edit_articulo', $medios) . view('estructura/endbody');
        }else{
        return view('estructura/header') . view('error');
    }
    
    }

    public function edit()
    {
        $UtileriaM = new UtileriaM;
        $request = \Config\Services::request();
        $articulo = array(
            'id_articulo' => $request->getPostGet('id_articulo'),
            'nombre' => $request->getPostGet('nombre'),
            'cantidad' => $request->getPostGet('cantidad'),
            'locker' => $request->getPostGet('locker'),
            'detalle' => $request->getPostGet('detalle')
        );

        var_dump($request->getPostGet('id_articulo'));
        if ($UtileriaM->update($request->getPostGet('id_articulo'), $articulo) === false) {
            var_dump($UtileriaM->errors());
            header("Location:" . base_url() . "/Utileria?est=false");
            exit();
        } else {
            header("Location:" . base_url() . "/Utileria?est=true");
            exit();
        }
    }
    public function delete()
    {
        $UtileriaM = new UtileriaM;
        $request = \Config\Services::request();
        if ($UtileriaM->delete($request->getPostGet('id_articulo')) === false) {
            header("Location:" . base_url() . "/Utileria?est=false");
            exit();
        } else {
            header("Location:" . base_url() . "/Utileria?est=true");
            exit();
        }
    }
}
