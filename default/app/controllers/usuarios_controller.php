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
        $usuarios = new usuarios(); 
        //se verifica si se ha enviado el formulario (submit)
        if(Input::hasPost('usuarios')){            
            if($usuarios->update(Input::post('usuarios'))){
                 Flash::valid('Operación exitosa');
                //enrutando por defecto al index del controller
                return Redirect::to("usuarios/micuenta/".$usro_id);
            } else {
                Flash::error('Falló Operación');
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
        $usuarios = new usuarios(); 
        //se verifica si se ha enviado el formulario (submit)
        if(Input::hasPost('usuarios')){            
            if($usuarios->update(Input::post('usuarios'))){
                 Flash::valid('Operación exitosa');
                //enrutando por defecto al index del controller
                return Redirect::to("usuarios/mod_usuario/".$usro_id);
            } else {
                Flash::error('Falló Operación');
            }
        } else {
            //Aplicando la autocarga de objeto, para comenzar la edición
            $this->usuarios = $usuarios->find_by_usro_id((int)$usro_id);
        }
    }
}