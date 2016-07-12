<?php
require_once MODELOS.'/modeloUsuario.php';

class controladorUsuarios{
    private $modelo;
    private $sesion;
    
    public function __construct() {
        $this->modelo = new modeloUsuario();
        $this->sesion = new controladorSesiones();
    }
    
    private function llamarVista($vista='',$datos=[]){
        ob_start();
        
        if(!empty($datos)){
            extract($datos);
        }
        
        require VISTAS.'/'.$vista.'.php';//hace referencia a la carpeta vistas. en $vista se mete el archivo que se vaya a usar
        ob_end_flush();
    }
    
    public function formulario_insertar_usuario(){
        $datos['usuario'] = $this->sesion->getSesion();
        $this->llamarVista('insertar_usuario', null);
    }
    
    public function insertar_usuarios(){
        $usuario = new Usuario();
        $usuario->setNombre($_REQUEST['nombre']);
        $usuario->setPassword($_REQUEST['password']);
        $usuario->setRol($_REQUEST['rol']);
        $this->modelo->insertarUsuarioApp($usuario);
        $datos['mensaje']="Usuario creado";
        $datos['usuario'] = $this->sesion->getSesion();
        $this->llamarVista('mostrar_mensajes', $datos);
    }
    
    public function borrar_usuarios(){
        $usuario = new Usuario();
        $usuario->setId($_REQUEST["id"]);
        $usuario_buscar = $this->modelo->buscarUsuarioApp($usuario);
        
        if(strcmp($datos['usuario']['nombre'], $usuario_buscar->getNombre())!=0){
            $this->modelo->borrarUsuarioApp($usuario);
            $datos['mensaje']="Usuario borrado";
        }
        else{
            $datos['mensaje']="No se puede borrar el propio usuario";
        }
        //$datos['usuario'] = $this->sesion->getSesion();
        $this->llamarVista('mostrar_mensajes', $datos);
    }
    
    public function listar_usuarios(){
        $datos['usuarios'] = $this->modelo->getUsuarioApp();
        $datos['usuario'] = $this->sesion->getSesion();
        $this->llamarVista('listar_usuarios', $datos);
    }
    
}