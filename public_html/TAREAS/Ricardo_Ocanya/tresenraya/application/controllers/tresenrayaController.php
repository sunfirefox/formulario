<?php
//seleccionar X para el jugador
include_once("../application/models/tresenrayaModel.php");
$tabla = iniciarPartida();
//echo "\n<br />inicia partida:<br />\n";
//print_r($tabla);
$tabla = pinta($tabla, "X");
//echo "\n<br />pinta tabla con X:<br />\n";
//print_r($tabla);
//seleccionar 0 para la máquina
if ($tabla != false)
{
	$tabla = pinta($tabla, "0");
//echo "\n<br />pinta tabla con 0:<br />\n";
//print_r($tabla);
	//guardamos los datos en el archivo
	if ($tabla != false)
	{
		guardarPartida($tabla);
	}
} else
{
	echo "la casilla seleccionada esta ocupada, porfavor, seleccione una vacia";
}
//echo "\n<br />guarda partida:<br />\n";
//print_r($tabla);
//Declarar ganador
$ganaX=gana($tabla, "X");
if ($ganaX==true)
{
	echo "Jugador 1 Gana.";
}
$gana0=gana($tabla, "0");
if ($gana0==true)
{
	echo "Jugador 2 Gana.";
}
$tablas=tablas($tabla);
if ($tablas && $ganaX==false && $gana0==false )
{
	echo "partida en tablas.";
}
//echo "\n<br />declara resultado:<br />\n";
//print_r($tabla);
//pintar la vista
include_once("../application/views/tresenrayaView.php");