<?php
require_once CLASES.'/contacto.php';

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
        
        $consulta = 'INSERT INTO contacto (nombre ,apellidos,direccion,telefono,email,imagen,contador_visitas) '
            .' VALUES ("'.addslashes($contacto->get_nombre()).'","'.addslashes($contacto->get_apellidos()).'","'.addslashes($contacto->get_direccion())
            .'","'.addslashes($contacto->get_telefono()).'","'.addslashes($contacto->get_email()).'","'.addslashes($contacto->get_imagen()).'","'
            .addslashes($contacto->get_contador_visitas()).'")';
        
        $resultado = mysql_query($consulta)
            or die("Consulta fallida ".  mysql_error());
        
        mysql_close($conexion);

        
    }
    
    public function borrarContacto($contacto){
        $conexion = mysql_connect($this->get_servidor(),$this->get_usuario(),$this->get_clave(),$this->get_BaseDatos())
                or die("No se pudo conectar a la base de datos");
        
        $baseDatos = mysql_select_db($this->get_BaseDatos(),$conexion)
            or die ("No se pudo conectar la base de datos");
        
        $consulta='DELETE FROM contacto WHERE id="' . $contacto->get_id() .'"';
        
        $resultado = mysql_query($consulta)
            or die("Consulta fallida ".  mysql_error());
        
        mysql_close($conexion);
    }
    
    public function actualizarContacto(){
        $conexion = mysql_connect($this->get_servidor(),$this->get_usuario(),$this->get_clave(),$this->get_BaseDatos())
                or die("No se pudo conectar a la base de datos");
        
        $baseDatos = mysql_select_db($this->get_BaseDatos(),$conexion)
            or die ("No se pudo conectar la base de datos");
        
        $consulta= 'UPDATE contacto SET nombre ="'. addslashes($contacto->get_nombre())
            .'", apellidos = "'.addslashes($contacto->get_apellidos())
            .'", direccion = "'.addslashes($contacto->get_direccion())
            .'", telefono = "'.addslashes($contacto->get_telefono())
            .'", email = "'.addslashes($contacto->get_email())
            .'", imagen = "'.addslashes($contacto->get_imagen())
            .'", contador_visitas ="'.addslashes($contacto->get_contadorVisitas())
        .'" WHERE id= '. $contacto->get_id();
        
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
            $contacto = new contacto($datos['id'],$datos['nombre'], $datos['apellidos']
                , $datos['direccion'], $datos['telefono'], $datos['email'], $datos['imagen'], $datos['contador_visitas']);

            $arrayContactos[] = $contacto;
            unset ($contacto);
        }
        
        mysql_close($conexion);
        
        return $arrayContactos;
    }
    
    public function buscarContacto($contacto){
        $conexion = mysql_connect($this->get_servidor(),$this->get_usuario(),$this->get_clave(),$this->get_BaseDatos())
                or die("No se pudo conectar a la base de datos");
        
        $baseDatos = mysql_select_db($this->get_BaseDatos(),$conexion)
            or die ("No se pudo conectar la base de datos");
        
        $consulta = 'SELECT * FROM contacto WHERE id='.$contacto->get_id();
        
        $resultado = mysql_query($consulta) or die ("Consulta fallida: ".mysql_error());
        
        if($datos=mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $contacto_resultado = new Contacto($datos['id'],$datos['nombre'],$datos['apellidos'],$datos['direccion'],$datos['telefono'],$datos['email'],$datos['imagen'],$datos['contador_visitas']);
        }
        
        return $contacto_resultado;
        
        mysql_close($conexion);
    }

}

