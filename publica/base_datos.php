<?php

$conexion = mysql_connect("localhost","root","")
        or die ("No se pudo conectar a la base de datos");//si falla la conexion sale lo del or die

$base_datos = mysql_select_db("prueba",$conexion)
        or die ("No se pudo conectar la base de datos");

$consulta = "SELECT * FROM animales";//select para mostrar -- muestra todos los animales

$resultado = mysql_query($consulta)
        or die("Consulta fallida ".  mysql_error());

echo "<table>";
echo "<tr>";
echo "<td>nombre</td><td>edad</td>";
echo "</tr>";
while ($fila = mysql_fetch_array($resultado)){
    echo "<tr>";
    echo "<td>".$fila['nombre']."</td><td>".$fila['edad']."</td>";
    echo "</tr>";
}

echo "</table>";

mysql_close($conexion);
