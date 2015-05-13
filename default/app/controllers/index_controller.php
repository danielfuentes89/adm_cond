<?php
/**
 * Controller para la pagina de inicio "index"
 */
class IndexController extends AppController
{
    public function index()    {        
        View::template('cover');
        Load::lib('auth');
        Load::lib('session');
        Load::model('usuarios');
        Session::delete("login");
        Auth::destroy_identity();
        if (Input::hasPost("inputEmail3","inputPassword3")){
            $pwd = Input::post("inputPassword3");
            $usuario=Input::post("inputEmail3"); 
            $auth = new Auth("model", "class: usuarios", "usro_correo: $usuario", "usro_pass: $pwd");
            if ($auth->authenticate()){
                $user = new Usuarios();
                $us = $user->find_first("usro_correo='$usuario'");
                Session::set('id', $us->usro_id);
                Session::set('login', $us->usro_login);
                Session::set('nombre', $us->usro_nombre);
                Session::set('apellido', $us->usro_apellido);
                Session::set('correo', $us->usro_correo);
                Session::set('nac', $us->usro_nac);
                Session::set('tpo', $us->usro_tpo);
                Flash::success("Bienvenido ".Session::get('nombre')." ".Session::get('apellido'));
                Router::redirect("principal/index");
            } else {
                Flash::error("Usuario o contraseña invalidos");
                Redirect::to('index');            
            }
        }
    }

}
