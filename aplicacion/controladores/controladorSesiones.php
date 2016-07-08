<?php
require_once MODELOS.'/modeloUsuario.php';

class controladorSesiones{
    private $modelo;
    private $usuario;
    
    public function __construct() {
        $this->modelo = new modeloUsuario();
        $this->usuario = new Usuario;
    }
    
    private function llamarVista($vista='',$datos=[]){
        ob_start();
        
        if(!empty($datos)){
            extract($datos);
        }
        
        require VISTAS.'/'.$vista.'.php';//hace referencia a la carpeta vistas. en $vista se mete el archivo que se vaya a usar
        ob_end_flush();
    }
    
    public function getUsuario(){
        return $this->usuario;
    }
    
    public function setUsuario($usuario){
        $this->usuario = $usuario;
        return $this;
    }
    
    public function login(){
        //llama a la vista login con null
        //$datos['usuario'] = $this->sesion->getSesion();
        $this->llamarVista('login',null);
    }
    
    public function estasLogueado(){
        //crea un usuario con el nombre y el password q le llega, busca ese usuario con buscarUsuarioAppPorNombre(),si existe 
        //el usuario iniciar sesion y almacenar en la sesion el nombre y el rol y devolver true
        //si el usuario es = null devolver false
        $usuario = new Usuario();
        $usuario->setNombre($_REQUEST['nombre']);
        $usuario->setPassword($_REQUEST['password']);
        $this->usuario = $this->modelo->buscarUsuarioAppPorNombre($usuario);
        if ($this->usuario){
             session_start();
             $_SESSION['usuario']['nombre']=  $this->usuario->getNombre();
             $_SESSION['usuario']['rol']=  $this->usuario->getRol();
             return true;
        }
        else {
        $this->usuario = null;
            return false;
        }
    }
    
    public function getSesion(){
        if(!isset($_SESSION['usuario']))
            session_start ();
        $datos['usuario']['nombre'] = $_SESSION['usuario']['nombre'];
        $datos['usuario']['rol'] = $_SESSION['usuario']['rol'];
        
        return $datos['usuario'];
    }
    
    public function salir(){
        session_start();
        unset($_SESSION['usuario']);
    }
    
}
