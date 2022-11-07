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
        $UsuariosM = new UsuariosM();
        $SociosM = new PagosM();
        $socios = $SociosM->find();
        $encargados = $UsuariosM->where('rol',2)->find();

        // Trae los datos de la tabla Socio-pagos
        $pagos = $PagosM->findAll(); 
        //crea un arreglo con la variable de session
        $user=[
            'nombre'=>$this->session->get('nombre'),
            'apellido'=>$this->session->get('apellido'),
            'rol'=>$this->session->get('rol'),
            'user'=> $this->session->get('user'),
            'documento'=>$this->session->get('documento'),
              ];
        //crea un arreglo de arreglo entre pagos y usuario
        $pagos = array('pagos' => $pagos,
         'usuario' => $user ,
         'nombresE' => $encargados, 
         'nombresF' => $socios); 

         
       
        // si el parametro tiene un usuario en seecion debuelve la pantalla de pagos
        if ($this->session->get('user') != null) {
            return view('estructura/header') . view('estructura/sidebar',$user) . view('pagos', $pagos) . view('estructura/endbody');
        } else {
            return view('estructura/header') . view('error');
        }
    }
    public function addPagos()
    {
        $UsuariosM = new UsuariosM();
        $SociosM = new SociosM();
        if ($this->session->get('user') != null) {
            $user=[
                'nombre'=>$this->session->get('nombre'),
                'apellido'=>$this->session->get('apellido'),
                'rol'=>$this->session->get('rol'),
                'user'=> $this->session->get('user'),
                'documento'=>$this->session->get('documento'),
                  ];
            $encargados = $UsuariosM->findAll();
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
        $request = \Config\Services::request();
        $PagosM = new PagosM();
        $UsuariosM = new UsuariosM();
        $SociosM = new SociosM();
        
        $socios_n = $SociosM->where('Id_socio',$request->getPostGet('SocioFK'))->findColumn('nombre');
        $socios_id = $SociosM->where('Id_socio',$request->getPostGet('SocioFK'))->findColumn('Id_socio');
        $encargado_n = $UsuariosM->where('id_usuario',$request->getPostGet('id_encargadoFK'))->findColumn('nombre'); 
        $encargado_id = $UsuariosM->where('id_usuario',$request->getPostGet('id_encargadoFK'))->findColumn('id_usuario');

        
        $pago = array(
            'id_usuarioFK' => $encargado_id,
            'nombre_encargado' => $encargado_n,
            'id_socioFK' => $socios_id,
            'nombre_socio' => $socios_n,
            'monto' => $request->getPostGet('monto'),
            'fecha' => $request->getPostGet('fecha')
        );
        
        if ($PagosM->insert($pago) === false) {
            
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
            $user=[
                'nombre'=>$this->session->get('nombre'),
                'apellido'=>$this->session->get('apellido'),
                'rol'=>$this->session->get('rol'),
                'user'=> $this->session->get('user'),
                'documento'=>$this->session->get('documento'),
                  ];
            $encargados = $UsuariosM->where('rol', 2)->find();
            $socios = $SociosM->findAll();
            
            $options = array(
                'options' => $encargados,
                'socios' => $socios,
                'pago' => $pago
            );

            return view('estructura/header') . view('estructura/sidebar', $user) . view('edit_pago', $options) . view('estructura/endbody');
        } else {
            return view('estructura/header') . view('error');
        }
    }
    public function edit()
    {
        $request = \Config\Services::request();
        $PagosM = new PagosM();
        $UsuariosM = new UsuariosM();
        $SociosM = new SociosM();
        //se trae al id del socio 
        $socios_n = $SociosM->where('Id_socio',$request->getPostGet('id_socioFK'))->findColumn('nombre');
        $socios_id = $SociosM->where('Id_socio',$request->getPostGet('id_socioFK'))->findColumn('Id_socio');
        //se trae al id del encargado
        $encargado_n = $UsuariosM->where('id_usuario',$request->getPostGet('id_encargadoFK'))->findColumn('nombre'); 
        $encargado_id = $UsuariosM->where('id_usuario',$request->getPostGet('id_encargadoFK'))->findColumn('id_usuario');
        
        var_dump($request->getPostGet('id_socioFK'));
        var_dump($request->getPostGet('id_encargadoFK'));
         
        $pagos = array(
            'id_pago' => $request->getPostGet('id_pago'),
            'id_usuarioFK' => $encargado_id ,
            'nombre_encargardo' => $encargado_n,
            'id_socioFK' => $socios_id,
            'nombre_socio' => $socios_n,
            'monto' => $request->getPostGet('monto'),
            'fecha' => $request->getPostGet('fecha')
        );
        
       
//si se realiza el cambio entodos los registros fijarsi si los name de los inputs coinciden
  
         if ($PagosM->update($request->getPostGet('id_pago'), $pagos) === false) {
             header("Location:" . base_url() . "/Pagos");
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