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
    }
    
    public function set_nombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function set_apellidos($apellidos){
        $this->apellidos = $apellidos;
    }
    
    public function set_direccion($direccion){
        $this->direccion = $direccion;
    }
    
    public function set_telefono($telefono){
        $this->telefono = $telefono;
    }
    
    public function set_email($email){
        $this->email = $email;
    }
    
    public function set_imagen($imagen){
        $this->imagen = $imagen;
    }
    
    public function set_contadorVisitas($contadorVisitas){
        $this->contadorVisitas = $contadorVisitas;
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
    
    public function get_contadorVisitas(){
        return $this->contadorVisitas;
    }
    
    public function incrementarContadorVisitas(){
        $this->contadorVisitas++;
    }
}

