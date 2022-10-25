<?php

namespace App\Controllers;

class Utileria extends BaseController
{
    public function index()
    {
        return view('estructura/header').view('estructura/sidebar').view('utileria').view('estructura/endbody');;
    } public function add()
    {
        return view('estructura/header').view('estructura/sidebar').view('add_articulo').view('estructura/endbody');;
    } public function edit()
    {
        return view('estructura/header').view('estructura/sidebar').view('edit_articulo').view('estructura/endbody');;
    }
}
