<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
Load::model('usuarios');


class UsuariosController extends AppController
{
    /**
     * Edita un Registro
     *
     * @param int $usro_id (requerido)
     */
    public function micuenta($usro_id)
    {        
        $usuarios = new Usuarios(); 
        //se verifica si se ha enviado el formulario (submit)
        if(Input::hasPost('usuarios')){ 
            try{
                if($usuarios->update(Input::post('usuarios'))){
                     Flash::valid('Operación exitosa');
                    //enrutando por defecto al index del controller
                    return Redirect::to("usuarios/micuenta/".$usro_id);
                } else {
                    Flash::error('Falló Operación');
                }
            }catch(KumbiaException $e){
                Flash::error("<div class='alert alert-danger col-sm-12' role='alert'>".$e->getMessage()."</div>");
             }
        } else {
            //Aplicando la autocarga de objeto, para comenzar la edición
            $this->usuarios = $usuarios->find_by_usro_id((int)$usro_id);
        }
    }
    
    public function lista_usuarios($page=1){
        $Usuarios = new Usuarios();
        $this->page = $Usuarios->ver($page);

    }
    
    public function mod_usuario($usro_id){
        $usuarios = new Usuarios(); 
        //se verifica si se ha enviado el formulario (submit)
        if(Input::hasPost('usuarios')){ 
            try{
                if($usuarios->update(Input::post('usuarios'))){
                     Flash::valid('Operación exitosa');
                    //enrutando por defecto al index del controller
                    return Redirect::to("usuarios/mod_usuario/".$usro_id);
                } else {
                    Flash::error('Falló Operación');
                }
            }catch(KumbiaException $e){
                Flash::error("<div class='alert alert-danger col-sm-12' role='alert'>".$e->getMessage()."</div>");
             }
        } else {
            //Aplicando la autocarga de objeto, para comenzar la edición
            $this->usuarios = $usuarios->find_by_usro_id((int)$usro_id);
        }
    }
    
    public function nueva_cuenta(){
        if(Input::hasPost('usuarios')){
            $usuarios = new Usuarios(Input::post('usuarios'));
            //En caso que falle la operación de guardar
            try{               
                if($usuarios->create()){
                    Flash::valid('Operación exitosa');
                    //Eliminamos el POST, si no queremos que se vean en el form
                    Input::delete();
                    return;               
                }else{
                    Flash::error('Falló Operación');
                }
             }catch(KumbiaException $e){
                //Flash::error("<div class='alert alert-danger col-sm-12' role='alert'>La direccion de correo ya está registrada para otro usuario</div>");
                    $mystring = (string)$e->getMessage();
                    $findme   = "duplicada";
                    $pos = strpos($mystring, $findme);
                    if ($pos !== false) {
                        Flash::error("<div class='alert alert-danger col-sm-12' role='alert'>La direccion de correo ya está registrada para otro usuario.</div>");
                    }
             }
        }
    }
}