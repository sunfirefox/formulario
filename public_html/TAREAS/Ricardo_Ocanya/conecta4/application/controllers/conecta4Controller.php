<?php
//pintar formulario
include_once("../application/views/formConecta4.php");
//pintar X en las casillas seleccionadas por el jugador
include_once("../application/models/conecta4Model.php");
$tabla = iniciarPartida();
$tabla = pintaX($tabla);
//print_r($tabla);
//echo "<br />\n";
//pintar 0 en las casillas seleccionadas por el programa
if ($tabla != false) {
	$tabla = pinta0($tabla);
	//guardamos los datos en el archivo
	guardarPartida($tabla);
} else {
	echo "la columna seleccionada esta completa, porfavor, seleccione una vacia";
}
//Declarar ganador
$ganaX=gana($tabla, "X");
if ($ganaX==true) {
	echo "Jugador 1 Gana.";
}
$gana0=gana($tabla, "0");
if ($gana0==true) {
	echo "Jugador 2 Gana.";
}
//pintar tabla 4x4
include_once("../application/views/tableConecta4.php");