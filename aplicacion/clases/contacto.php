<?php

class contacto{
    private $id;
    private $nombre;
    private $apellidos;
    private $direccion;
    private $telefono;
    private $email;
    private $imagen;
    private $contadorVisitas;
    
    public function __construct($id=0,$nombre='',$apellidos='',$direccion='',$telefono='',$email='',$imagen='',$contadorVisitas=0) {
        $this->set_id($id);
        $this->set_nombre($nombre);
        $this->set_apellidos($apellidos);
        $this->set_direccion($direccion);
        $this->set_telefono($telefono);
        $this->set_email($email);
        $this->set_imagen($imagen);
        $this->set_contadorVisitas($contadorVisitas);
    }
    
    public function set_id($id){
        $this->id = $id;
        return $this;
    }
    
    public function set_nombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }
    
    public function set_apellidos($apellidos){
        $this->apellidos = $apellidos;
        return $this;
    }
    
    public function set_direccion($direccion){
        $this->direccion = $direccion;
        return $this;
    }
    
    public function set_telefono($telefono){
        $this->telefono = $telefono;
        return $this;
    }
    
    public function set_email($email){
        $this->email = $email;
        return $this;
    }
    
    public function set_imagen($imagen){
        $this->imagen = $imagen;
        return $this;
    }
    
    public function set_contadorVisitas($contador_visitas){
        $this->contador_visitas = $contador_visitas;
    }
    
    public function get_id(){
        return $this->id;
    }
    
    public function get_nombre(){
        return $this->nombre;
    }
    
    public function get_apellidos(){
        return $this->apellidos;
    }
    
    public function get_direccion(){
        return $this->direccion;
    }
    
    public function get_telefono(){
        return $this->telefono;
    }
    
    public function get_email(){
        return $this->email;
    }
    
    public function get_imagen(){
        return $this->imagen;
    }
    
    public function get_contador_visitas(){
        return $this->contador_visitas;
    }
    
    public function incrementarContadorVisitas(){
        $this->contador_visitas++;
    }
}

