<?php
//require_once CLASES.'/modeloContacto.php';

class modeloContacto{
    private $servidor;
    private $usuario;
    private $clave;
    private $baseDatos;
    
    public function __construct() {
        $this->set_servidor(SERVIDOR);
        $this->set_usuario(USUARIO);
        $this->set_clave(CLAVE);
        $this->set_baseDatos(BASEDATOS);
    }

    public function set_servidor($servidor){
        $this->servidor = $servidor;
    }
    
    public function set_usuario($usuario){
        $this->usuario = $usuario;
    }
    
    public function set_clave($clave){
        $this->clave = $clave;
    }
    
    public function set_baseDatos($baseDatos){
        $this->baseDatos = $baseDatos;
    }
    
    public function get_servidor(){
        return $this->servidor;
    }
    
    public function get_usuario(){
        return $this->usuario;
    }
    
    public function get_clave(){
        return $this->clave;
    }
    
    function get_BaseDatos() {
        return $this->baseDatos;
    }
    
    public function conectarBaseDatos(){
        $conexion = mysql_connect("localhost","root","")
            or die ("No se pudo conectar a la base de datos");

        $baseDatos = mysql_select_db("agenda",$conexion)
            or die ("No se pudo conectar la base de datos");
        
        $consulta = "SELECT * FROM contacto";

        $resultado = mysql_query($consulta)
            or die("Consulta fallida ".  mysql_error());
        
        echo "<table>";
        echo "<tr>";
        echo "<td>nombre</td><td>apellidos</td>";
        echo "</tr>";
        while ($fila = mysql_fetch_array($resultado)){
            echo "<tr>";
            echo "<td>".$fila['nombre']."</td><td>".$fila['apellidos']."</td>";
            echo "</tr>";
        }

        echo "</table>";
        
        mysql_close($conexion);
    }
    
    public function insertarContacto(){
        $conexion = mysql_connect($this->get_servidor(),$this->get_usuario(),$this->get_clave(),$this->get_BaseDatos())
                or die("No se pudo conectar a la base de datos");
        
        $baseDatos = mysql_select_db($this->get_BaseDatos(),$conexion)
            or die ("No se pudo conectar la base de datos");
        
        $consulta = 'INSERT INTO contacto (nombre ,apellidos,direccion,telefono,email,imagen,contadorVisitas) '
            .' VALUES ("'.addslashes($contacto->getNombre()).'","'.addslashes($contacto->getApellidos()).'","'.addslashes($contacto->getDireccion())
            .'","'.addslashes($contacto->getTelefono()).'","'.addslashes($contacto->getEmail()).'","'.addslashes($contacto->getImagen()).'","'
            .addslashes($contacto->getContadorVisitas()).'")';
        
        $resultado = mysql_query($consulta)
            or die("Consulta fallida ".  mysql_error());
        
        mysql_close($conexion);

        
    }
    
    public function borrarContacto(){
        $conexion = mysql_connect($this->get_servidor(),$this->get_usuario(),$this->get_clave(),$this->get_BaseDatos())
                or die("No se pudo conectar a la base de datos");
        
        $baseDatos = mysql_select_db($this->get_BaseDatos(),$conexion)
            or die ("No se pudo conectar la base de datos");
        
        $consulta='DELETE FROM contacto WHERE id="' . $contacto->getId() .'"';
        
        $resultado = mysql_query($consulta)
            or die("Consulta fallida ".  mysql_error());
        
        mysql_close($conexion);
    }
    
    public function actualizarContacto(){
        $conexion = mysql_connect($this->get_servidor(),$this->get_usuario(),$this->get_clave(),$this->get_BaseDatos())
                or die("No se pudo conectar a la base de datos");
        
        $baseDatos = mysql_select_db($this->get_BaseDatos(),$conexion)
            or die ("No se pudo conectar la base de datos");
        
        $consulta= 'UPDATE contacto SET nombre ="'. addslashes($contacto->getNombre())
            .'", apellidos = "'.addslashes($contacto->getApellidos())
            .'", direccion = "'.addslashes($contacto->getDireccion())
            .'", telefono = "'.addslashes($contacto->getTelefono())
            .'", email = "'.addslashes($contacto->getEmail())
            .'", imagen = "'.addslashes($contacto->getImagen())
            .'", contador_visitas ="'.addslashes($contacto->getContadorVisitas())
        .'" WHERE id= '. $contacto->getId();
        
        $resultado = mysql_query($consulta)
            or die("Consulta fallida ".  mysql_error());
        
        mysql_close($conexion);
    }
    
    public function get_contacto(){
        $conexion = mysql_connect($this->get_servidor(),$this->get_usuario(),$this->get_clave(),$this->get_BaseDatos())
                or die("No se pudo conectar a la base de datos");
        
        $baseDatos = mysql_select_db($this->get_BaseDatos(),$conexion)
            or die ("No se pudo conectar la base de datos");
        
        $consulta= 'SELECT * FROM contacto ORDER BY contador_visitas DESC';
        
        $resultado = mysql_query($consulta)
            or die("Consulta fallida ".  mysql_error());
        
         while ($datos=mysql_fetch_array($resultado,MYSQL_ASSOC))
        {
            $contacto = new Contacto($datos['nombre'], $datos['apellidos']
                , $datos['direccion'], $datos['telefono'], $datos['email'], $datos['imagen'], $datos['id'],$datos['contador_visitas']);

            $arrayContactos[] = $contacto;
            unset ($contacto);
        }
        
        mysql_close($conexion);
    }
    
    public function buscarContacto(){
        $conexion = mysql_connect($this->get_servidor(),$this->get_usuario(),$this->get_clave(),$this->get_BaseDatos())
                or die("No se pudo conectar a la base de datos");
        
        $baseDatos = mysql_select_db($this->get_BaseDatos(),$conexion)
            or die ("No se pudo conectar la base de datos");
        
        $consulta = 'SELECT * FROM contacto WHERE id='.$contacto->get_id();
        
        $resultado = mysql_query($consulta) or die ("Consulta fallida: ".mysql_error());
        
        if($datos=mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $contacto_resultado = new Contacto($datos['nombre'],$datos['apellidos'],$datos['direccion'],$datos['telefono'],$datos['email'],$datos['imagen'],$datos['contadorVisitas']);
        }
        
        mysql_close($conexion);
    }

}

