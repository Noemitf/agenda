<?php
require_once CONTROLADORES.'/controladorContactos.php';
require_once CONTROLADORES.'/controladorSesiones.php';
require_once CONTROLADORES.'/controladorUsuarios.php';

class controladorRutas{
    private $controladorContactos;
    private $controladorSesiones;
    private $controladorUsuarios;
    
    public function __construct() {
        $this->controladorSesiones = new controladorSesiones();
        $this->controladorContactos = new controladorContacto($this->controladorSesiones);
        $this->controladorUsuarios = new ControladorUsuarios($this->controladorSesiones);
    }
    
    public function gestionarRuta(){
        if (isset($_REQUEST['accion'])){//$_REQUEST es para obtener un valor de los que se le pasa en la url.Sale en la página abajo del todo a la izqueirda
            
            switch ($_REQUEST['accion']){
                case 'principal':
                    $this->controladorContactos->paginaPrincipal();
                    break;
                case 'login':
                    if ($this->controladorSesiones->estasLogueado()){
                        $this->controladorContactos->paginaPrincipal();
                    }
                    else{
                        $this->controladorSesiones->login(false);
                    }
                    break;
                case 'insertar':
                    $this->controladorContactos->insertarContactos();
                    break;
                case 'vistainsertar':
                    $this->controladorContactos->formularioInsertarContacto();
                    break;
                case 'editar':
                    $this->controladorContactos->editarContactos();
                    break;
                case 'vistaeditar':
                    $this->controladorContactos->formularioEditarContacto();
                    break;
                case 'borrar':
                    $this->controladorContactos->borrarContactos();
                    break;
                case 'listar':
                    $this->controladorContactos->listarContactos();
                    break;
                case 'mostrar':
                    $this->controladorContactos->mostrarContactos();
                    break;
                case 'listarUsuarios':
                    $this->controladorUsuarios->listar_usuarios();
                    break;
                case 'vistaInsertarUsuario':
                    $this->controladorUsuarios->formulario_insertar_usuario();
                    break;
                case 'insertarUsuario':
                    $this->controladorUsuarios->insertar_usuarios();
                    break;
                case 'borrarUsuario':
                    $this->controladorUsuarios->borrar_usuarios();
                    break;
                case 'salir':
                    $this->controladorSesiones->salir();
                    $this->controladorSesiones->login(true);
                    break;
        }//cierra el switch
    }//cierra if isset
    else{
            $this->controladorSesiones->login(true);
        }
}//cierra gestionarRuta
}//cierra la clase
