<?php

namespace App\Controllers;

class Gastos extends BaseController
{
    public function index()
    {
        return view('estructura/header').view('estructura/sidebar').view('gastos').view('estructura/endbody');;
    }
    public function add()
    {
        return view('estructura/header').view('estructura/sidebar').view('add_gasto').view('estructura/endbody');;
    }
    public function edit()
    {
        return view('estructura/header').view('estructura/sidebar').view('edit_gasto').view('estructura/endbody');;
    }
}
