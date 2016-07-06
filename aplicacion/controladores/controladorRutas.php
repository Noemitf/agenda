<?php
require_once CONTROLADORES.'/controladorContactos.php';
require_once CONTROLADORES.'/controladorSesiones.php';
require_once CONTROLADORES.'/controladorUsuarios.php';

class controladorRutas{
    private $controladorContactos;
    private $controladorSesiones;
    private $controladorUsuarios;
    
    public function __construct() {
        $this->controlador = new controladorContacto();
        $this->controladorSesiones = new controladorSesiones($this->controladorSesiones);
        $this->controladorUsuarios = new ControladorUsuarios($this->controladorSesiones);
    }
    
    public function gestionarRuta(){
        if (isset($_REQUEST['accion'])){//$_REQUEST es para obtener un valor de los que se le pasa en la url.Sale en la página abajo del todo a la izqueirda
            
            switch ($_REQUEST['accion']){
                case 'principal':
                    $this->controladorContactos->pagina_principal();
                    break;
                case 'login':
                    if ($this->controladorSesiones->estasLogueado()){
                        $this->controladorContactos->pagina_principal();
                    }
                    else{
                        $this->controladorSesiones->login();
                    }
                    break;
                case 'insertar':
                    $this->controlador->insertarContactos();
                    break;
                case 'vistainsertar':
                    $this->controlador->formularioInsertarContacto();
                    break;
                case 'editar':
                    $this->controlador->editarContactos();
                    break;
                case 'vistaeditar':
                    $this->controlador->formularioEditarContacto();
                    break;
                case 'borrar':
                    $this->controlador->borrarContactos();
                    break;
                case 'listar':
                    $this->controlador->listarContactos();
                    break;
                case 'mostrar':
                    $this->controlador->mostrarContactos();
                    break;
                case 'listarUsuarios':
                    $this->controladorUsuarios->listar_usuarios();
                    break;
                case 'vistaInsertarUsuario':
                    $this->controladorUsuarios->insertar_usuarios();
                    break;
                case 'insertarUsuario':
                    $this->controladorUsuarios->insertar_usuario();
                    break;
                case 'borrarUsuario':
                    $this->controladorUsuarios->borrar_usuario();
                    break;
                case 'salir':
                    $this->controladorSesiones->salir();
                    $this->controladorSesiones->login();
                    break;
        }//cierra el switch
    }//cierra if isset
    else{
            $this->controladorSesiones->login();
        }
}//cierra gestionarRuta
}//cierra la clase
