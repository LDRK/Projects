<?php


$server = "127.0.0.1";
$user = "root";
$password = "";
$database = "registrousers";

//Create conection

$conexion = new mysqli($server,$user,$password,$database);

//Check conection

if(!$conexion){
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Conection  successful";




?>