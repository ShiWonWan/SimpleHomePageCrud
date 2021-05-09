<?php
    $server =  "localhost";
    $user = '';
    $pass = '';
    $db = 'home';

    $conexion = new mysqli($server, $user, $pass, $db);

    if($conexion -> connect_error){
      die("Conexión fallida: ".$conexion->connection_error);
    }
