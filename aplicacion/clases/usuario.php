<?php

class Usuario implements Serializable{
    public $id;
    private $nombre;
    private $password;
    private $rol;
    
    public function __construct($nombre='',$password='',$rol='invitado',$id=0) {
        $this->setNombre($nombre);
        $this->setPassword($password);
        $this->setRol($rol);
        $this->setId($id);
    }
    
    public function setId($id){
        $this->id = $id;
        return $this;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function setPassword($password){
        $this->password = $password;
        return $this;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function setRol($rol){
        $this->rol = $rol;
        return $this;
    }
    
    public function getRol(){
        return $this->rol;
    }
    
    function serialize() {
        return serialize($this->nombre);
        return serialize($this->password);
        return serialize($this->rol);
        return serialize($this->id);
    }
    
    function unserialize($datos) {
        $this->nombre = unserialize($datos);;
    }
    
}

