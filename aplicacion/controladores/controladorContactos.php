<?php
require_once MODELOS.'/modeloContacto.php';


class controladorContacto{
    private $modelo;
    private $sesion;


    public function __construct($sesion) {
        $this->modelo = new modeloContacto();
        $this->sesion = $sesion;
    }
    
    private function llamarVista($vista,$datos){
        ob_start();
        
        if(!empty($datos)){
            extract($datos);
        }
        
        require VISTAS.'/'.$vista.'.php';//hace referencia a la carpeta vistas. en $vista se mete el archivo que se vaya a usar
        ob_end_flush();
    }
    
    private function uploadFoto(){
        if($_FILES['fichero']['name']){
            if(!$_FILES['fichero']['error']){
                $nuevo_nombre = md5_file($_FILES['fichero']['tmp_name']);
                move_uploaded_file($_FILES['fichero']['tmp_name'], IMAGENESDATOS."/".$nuevo_nombre);
            }
        }else{
            $nuevo_nombre = "foto.png";
        }
        return $nuevo_nombre;
    }
    
    public function paginaPrincipal(){
        //obtener los contactos, meterlos en una variable datos que es un array y la clave valor es contactos
        $datos['contactos'] = $this->modelo->get_contacto();//['contactos'] dentro tiene un array con todos los contactos
        $datos['usuario'] = $this->sesion->getSesion();
        $this->llamarVista('pagina_principal', $datos);
    }
    
    public function formularioInsertarContacto(){
        $datos['usuario'] = $this->sesion->getSesion();
        $this->llamarVista('insertar_contacto', null);
    }
    
    public function formularioEditarContacto(){
        $contacto = new contacto();
        $contacto->set_id($_REQUEST["id"]);
        $contacto_buscar = $this->modelo->buscarContacto($contacto);
        $datos['contacto'] = $contacto_buscar;//['contacto'] solo llama a un contacto
        $datos['usuario'] = $this->sesion->getSesion();
        $this->llamarVista('editar_contacto', $datos);
    }
    
    public function insertarContactos(){
        $contacto = new contacto();
        $contacto->set_nombre($_REQUEST['nombre']);
        $contacto->set_apellidos($_REQUEST['apellidos']);
        $contacto->set_direccion($_REQUEST['direccion']);
        $contacto->set_telefono($_REQUEST['telefono']);
        $contacto->set_email($_REQUEST['email']);
        $contacto->set_imagen($this->uploadFoto());
        $this->modelo->insertarContacto($contacto);
        $datos['mensaje']="Contacto insertado";
        $datos['usuario'] = $this->sesion->getSesion();
        $this->llamarVista('mostrar_mensajes', $datos);
    }

    public function editarContactos(){
        $contacto = new contacto();
        $contacto->set_id($_REQUEST['id']);
        $contacto->set_nombre($_REQUEST['nombre']);
        $contacto->set_apellidos($_REQUEST['apellidos']);
        $contacto->set_direccion($_REQUEST['direccion']);
        $contacto->set_telefono($_REQUEST['telefono']);
        $contacto->set_email($_REQUEST['email']);
        
        if(!empty($_FILES['fichero']['name'])){
            // Borrar imagen
            if(strcmp($_REQUEST['imagen'], "foto.png")!=0)
                unlink(IMAGENESDATOS."/".$_REQUEST['imagen']);
            $contacto->set_imagen($this->uploadFoto());
        }else{
            $contacto->set_imagen($_REQUEST['imagen']);
        }
        
        $this->modelo->actualizarContacto($contacto);
        $datos['mensaje'] = "Contacto actualizado correctamente";
        $datos['usuario'] = $this->sesion->getSesion();
        $this->llamarVista('mostrar_mensajes', $datos);
    }
    
    public function borrarContactos(){
        $contacto = new contacto();
        $contacto->set_id($_REQUEST["id"]);
        $contacto_buscar = $this->modelo->buscarContacto($contacto);//('contacto') solo llama a un contacto
        
        // Borrar imagen
        if(strcmp($contacto_buscar->get_imagen(), "foto.png")!=0)
            unlink(IMAGENESDATOS."/".$contacto_buscar->get_imagen());
        
        $this->modelo->borrarContacto($contacto);
        $datos['mensaje']="Contacto borrado";
        $datos['usuario'] = $this->sesion->getSesion();
        $this->llamarVista('mostrar_mensajes', $datos);
    }
    
    public function listarContactos(){
        $datos['contactos'] = $this->modelo->get_contacto();//['contactos'] dentro tiene un array con todos los contactos
        $datos['usuario'] = $this->sesion->getSesion();
        $this->llamarVista('listar_contactos', $datos);
    }
    
    public function mostrarContactos(){
        $contacto = new contacto();
        $contacto->set_id($_REQUEST["id"]);
        $contacto_buscar = $this->modelo->buscarContacto($contacto);
        $contacto_buscar->incrementarContadorVisitas();
        $this->modelo->actualizarContacto($contacto_buscar);
        $datos['contacto'] = $contacto_buscar;
        $datos['usuario'] = $this->sesion->getSesion();
        $this->llamarVista('mostrar_contacto', $datos);
    }
}

