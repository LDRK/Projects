<?php
$host='localhost';
$usu='root';
$pw='';
$bd='autenticacion';
$conexion=mysqli_connect($host,$usu,$pw,$bd);
if(!$conexion){
	echo "No se puede conectar:".mysqli_connect_errno();
}else{
     //echo  "Conexion Exitosa";
}

?>