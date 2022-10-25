<?php

namespace App\Controllers;

use App\Models\IngresosM;

class Ingresos extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        $ingresosM = new IngresosM();
        $ingresos = $ingresosM->findAll();
        $ingresos = array('ingresos'=>$ingresos);
        return view('estructura/header').view('estructura/sidebar').view('ingresos',$ingresos).view('estructura/endbody');;
    }
    
    public function addIngreso()
    {
        return view('estructura/header').view('estructura/sidebar').view('add_ingreso').view('estructura/endbody');;
    }
    public function add()
    {
         $ingresosM = new IngresosM();
         $request= \Config\Services::request();
         $ingreso=array(
            'monto' => $request->getPostGet('monto'),
            'fecha' => $request->getPostGet('fecha'),
            'detalles' => $request->getPostGet('detalles')
         );
         if($ingresosM->insert($ingreso)===false){
            var_dump($ingresosM->errors());
            header("Location:".base_url()."/Ingresos?est=false");
            exit();
    }else{
        header("Location:".base_url()."/Ingresos?est=true");
        exit();
    } 
    }
    public function editIngreso()
    {
        $ingresosM= new IngresosM();
        $ingreso= $ingresosM->find($_GET['id_ingreso']);
        return view('estructura/header').view('estructura/sidebar').view('edit_ingreso',$ingreso).view('estructura/endbody');;
    }
    public function edit()
        {
            $ingresosM= new IngresosM();
            $request= \Config\Services::request();
        $ingreso=array( 
            'monto' => $request->getPostGet('monto'),
            'fecha' => $request->getPostGet('fecha'),
            'detalles' => $request->getPostGet('detalles')           
        );
      
    if($ingresosM->update($request->getPostGet('id_ingreso'),$ingreso)===false){
            header("Location:".base_url()."/Ingresos?est=false");
            exit();
    }else{
        var_dump($ingreso);
         header("Location:".base_url()."/Ingresos?est=true");
         exit();
    } 
        }
        public function delete()
        {
            $ingresosM= new IngresosM();
            $request= \Config\Services::request();
            if($ingresosM->delete($request->getPostGet('id_ingreso'))===false){
                header("Location:".base_url()."/Ingresos?est=false");
                exit();
        }else{
            header("Location:".base_url()."/Ingresos?est=true");
            exit();
        } 
        }    
}
