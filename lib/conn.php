<?php
$host = "localhost";
$usuario = "root";
$clave = "123456"; 
$db = "UsuariosApp";
$puertos = "3306";
$conn = mysqli_connect($host, $usuario, $clave, $db, $puertos) or die("Error al conectarse a la base de datos");
