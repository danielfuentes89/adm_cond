<?php

/**
 * Controller por defecto si no se usa el routes
 * 
 */
class IndexController extends AppController
{

    public function index()
    {
        View::template('cover');
        Load::lib('auth');
        Load::model('usuarios');
        if (Input::hasPost("inputEmail3","inputPassword3")){
            $pwd = Input::post("inputPassword3");
            $usuario=Input::post("inputEmail3"); 
            $auth = new Auth("model", "class: usuarios", "login: $usuario", "password: $pwd");
            if ($auth->authenticate()) {
                $login = new Usuarios();
                $us = $login->find_first("login='$usuario'");
                $edad = $us->edad;
                Session::set('edad', $edad);
                Flash::success("Correcto");
                Router::redirect("principal/index");
            } else {
                Flash::error("Usuario o contraseña invalidos");
                Redirect::to('index');            
            }
        }
    }

}
