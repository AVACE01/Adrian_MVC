<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "examen";
$port = 3307;

$conexion = new mysqli($host, $user, $pass, $db, $port);

if($conexion->connect_error){
    die("Error de conexion: " . $conexion->connect_error);
}

?>