<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>

<html>
    <head>
        <title></title>
    </head>
    <body>
        <h1>Enviar archivos</h1>
        <form action="recoger_archivos.php" enctype="multipart/form-data" method="POST">
            <label for="fichero">Fichero:</label>
            <input type="file" name="fichero">
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>

