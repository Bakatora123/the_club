<?php

namespace App\Controllers;

class Pagos extends BaseController
{
    public function index()
    {
        return view('estructura/header').view('estructura/sidebar').view('pagos').view('estructura/endbody');;
    }
    public function add()
    {
        return view('estructura/header').view('estructura/sidebar').view('add_pago').view('estructura/endbody');;
    }
    public function edit()
    {
        return view('estructura/header').view('estructura/sidebar').view('edit_pago').view('estructura/endbody');;
    }
}
