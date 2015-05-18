/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function trae_cuenta(id){
    //window.location.href= "<?php// echo PUBLIC_PATH . 'usuarios/mod_usuario/'; ?>"+id;
    $.ajax({ 
            type: "POST", 
            url: "<?php echo PUBLIC_PATH . 'usuarios/mod_usuario/'; ?>"+id, 
            //data: "nombre=" + nombre,
            beforeSend: function () {
            $("#resultado-ajax").html("");
                },
            success: function(datos){ 
            $("#resultado-ajax").html(datos); 
            } 
       }); 
}