<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PrincipalController extends AppController
{

    public function index()
    {
        $this->wellcome = "Bienvenido ".Session::get('nombre')." ".Session::get('apellido')."!!";
    }
    
    public function logout()
    {
        
    }
}