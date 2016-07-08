<?php

require_once CLASES.'/usuario.php';

class modeloUsuario{
    private $servidor;
    private $usuario;
    private $clave;
    private $baseDatos;
    
    public function __construct() {
        $this->setServidor(SERVIDOR);
        $this->setUsuario(USUARIO);
        $this->setClave(CLAVE);
        $this->setBaseDatos(BASEDATOS);
    }
    
    public function setServidor($servidor){
        $this->servidor = $servidor;
    }
    
    public function getServidor(){
        return $this->servidor;
    }
    
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }
    
    public function setClave($clave){
        $this->clave = $clave;
    }
    
    public function getClave(){
        return $this->clave;
    }
    
    public function setBaseDatos($baseDatos){
        $this->baseDatos = $baseDatos;
    }
    
    public function getBaseDatos(){
        return $this->baseDatos;
    }
    
    public function insertarUsuarioApp($usuario){
        $conexion = mysql_connect($this->getServidor(),$this->getUsuario(),$this->getClave(),$this->getBaseDatos())
                or die("No se pudo conectar a la base de datos");
        
        $baseDatos = mysql_select_db($this->getBaseDatos(),$conexion)
            or die ("No se pudo conectar la base de datos");
        
        $consulta = 'INSERT INTO usuario (nombre,password,rol,id) '
            .' VALUES ("'.addslashes($usuario->getNombre()).'","'.addslashes($usuario->getPassword()).'","'.addslashes($usuario->getRol())
            .'","'.addslashes($usuario->getId()).'")';
        
        $resultado = mysql_query($consulta)
            or die("Consulta fallida1 ".  mysql_error());
        
        mysql_close($conexion);
        
        return $resultado;
    }
    
    public function borrarUsuarioApp($usuario){
        $conexion = mysql_connect($this->getServidor(),$this->getUsuario(),$this->getClave())
                or die("No se pudo conectar a la base de datos");
        
        $baseDatos = mysql_select_db($this->getBaseDatos(),$conexion)
            or die ("No se pudo conectar la base de datos");
        
        $consulta='DELETE FROM usuario WHERE id="' . $usuario->getId() .'"';
        
        $resultado = mysql_query($consulta)
            or die("Consulta fallida2 ".  mysql_error());
        
        mysql_close($conexion);
    }
    
    public function getUsuarioApp(){//array
        $conexion = mysql_connect($this->getServidor(),$this->getUsuario(),$this->getClave(),$this->getBaseDatos())
                or die("No se pudo conectar a la base de datos");
        
        $baseDatos = mysql_select_db($this->getBaseDatos(),$conexion)
            or die ("No se pudo conectar la base de datos");
        
        $consulta= 'SELECT * FROM usuario ORDER BY id DESC';
        
        $resultado = mysql_query($consulta)
            or die("Consulta fallida3 ".  mysql_error());
        
        while ($datos=mysql_fetch_array($resultado,MYSQL_ASSOC))
        {
            $usuario = new Usuario ( $datos['nombre'], $datos['password'],$datos['rol'],$datos['id']);
            $arrayUsuarios[] = $usuario;
            unset ($usuario);
        
        }
        
        mysql_close($conexion);
        
        return (isset($arrayUsuarios) ? $arrayUsuarios : null);
    }
    
    public function buscarUsuarioApp($usuario){
         $conexion = mysql_connect($this->getServidor(),$this->getUsuario(),$this->getClave(),$this->getBaseDatos())
                or die("No se pudo conectar a la base de datos");
        
        $baseDatos = mysql_select_db($this->getBaseDatos(),$conexion)
            or die ("No se pudo conectar la base de datos");
        
        $consulta = 'SELECT * FROM usuario WHERE id='.$usuario->getId();
        
        $resultado = mysql_query($consulta) or die ("Consulta fallida4: ".mysql_error());
        
        if($datos=mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $usuario_resultado = new Usuario($datos['nombre'],$datos['password'],$datos['rol'],$datos['id']);
        }
        
        return $usuario_resultado;
        
        mysql_close($conexion);
    }
    
    public function buscarUsuarioAppPorNombre($usuario){
        $conexion = mysql_connect($this->getServidor(),$this->getUsuario(),$this->getClave(),$this->getBaseDatos())
                or die("No se pudo conectar a la base de datos");
        
        $baseDatos = mysql_select_db($this->getBaseDatos(),$conexion)
            or die ("No se pudo conectar la base de datos");
        
        $consulta = 'SELECT * FROM usuario WHERE nombre="'.$usuario->getNombre().'" and password="'.$usuario->getPassword().'"';
        
       
        $resultado = mysql_query($consulta) or die ("Consulta fallida5: ".mysql_error());
      
        $usuario_resultado = null;
        
        if($datos=mysql_fetch_array($resultado, MYSQL_ASSOC)){
           
            $usuario_resultado = new Usuario($datos['nombre'],$datos['password'],$datos['rol'],$datos['id']);
        }
        
        return $usuario_resultado;
        
        mysql_close($conexion);
    }
}
