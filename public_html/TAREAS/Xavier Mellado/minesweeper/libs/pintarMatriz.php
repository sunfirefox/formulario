<?php

// Pintar matriz
function pintarMatriz($matriz, $tamano)
{
	$filas = $tamano;
	$columnas = $tamano;

	echo "<table>";
	for($i=0;$i<$filas;++$i)
	{
		echo "<tr>";
		for($j=0;$j<$columnas;++$j)
		{
			echo "<td>";
			echo $matriz[$i][$j];
			echo "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}