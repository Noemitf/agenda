<?php
require_once MODELOS.'/modeloContacto.php';


class controladorContacto{
    private $modelo;
    
    public function __construct() {
        $this->modelo = new modeloContacto();
    }
    
    private function llamarVista($vista,$datos){
        ob_start();
        
        if(!empty($datos)){
            extract($datos);
        }
        
        require VISTAS.'/'.$vista.'.php';//hace referencia a la carpeta vistas. en $vista se mete el archivo que se vaya a usar
        ob_end_flush();
    }
    
    public function uploadFoto(){
        
    }
    
    public function paginaPrincipal(){
        //obtener los contactos, meterlos en una variable datos que es un array y la clave valor es contactos
        $datos['contactos'] = $this->modelo->get_contacto();//['contactos'] dentro tiene un array con todos los contactos
        $this->llamarVista('pagina_principal', $datos);
    }
    
    public function formularioInsertarContacto(){
        
    }
    
    public function formularioEditarContacto(){
        
    }
    
    public function insertarContactos(){
        $datos['contactos'] = $this->modelo->get_contacto();//['contactos'] dentro tiene un array con todos los contactos
        $this->llamarVista('insertar_contactos', $datos);
    }

    public function editarContactos(){
        
    }
    
    public function borrarContactos(){
        
    }
    
    public function listarContactos(){
        $datos['contactos'] = $this->modelo->get_contacto();//['contactos'] dentro tiene un array con todos los contactos
        $this->llamarVista('listar_contactos', $datos);
    }
    
    public function mostrarContactos(){
        
    }
}

