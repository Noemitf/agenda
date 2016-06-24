<?php
require_once CONTROLADORES.'/controladorContactos.php';

class controladorRutas{
    private $controladorContactos;
    
    public function __construct() {
        $this->controlador = new controladorContacto();
    }
    
    public function gestionarRuta(){
        if (isset($_REQUEST['accion'])){//$_REQUEST es para obtener un valor de los que se le pasa en la url.Sale en la página abajo del todo a la izqueirda
            
            switch ($_REQUEST['accion']){
                case 'insertar';
                    $this->controlador->insertarContactos();
                    break;
                case 'vistainsertar';
                    $this->controlador->formularioInsertarContacto();
                    break;
                case 'editar';
                    $this->controlador->editarContactos();
                    break;
                case 'vistaeditar';
                    $this->controlador->formularioEditarContacto();
                    break;
                case 'borrar';
                    $this->controlador->borrarContactos();
                    break;
                case 'listar';
                    $this->controlador->listarContactos();
                    break;
                case 'mostrar';
                    $this->controlador->mostrarContactos();
                    break;
            }
        }else{
            $this->controlador->paginaPrincipal();
        }
    }
}

