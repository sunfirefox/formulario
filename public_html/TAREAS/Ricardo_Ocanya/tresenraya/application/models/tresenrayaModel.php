<?php
/**
 * 
 * @return string|unknown
 */
function iniciarPartida()
{
	if (!$_POST)
	{
		file_put_contents("jugada3.txt", "" );
		for($f=1; $f<=3; $f++)
		{
			for($c=1; $c<=3; $c++)
			{
				file_put_contents("jugada3.txt", '-', FILE_APPEND);
				$tabla[$f][$c]='-';
				if ($c!=3)
				{
					file_put_contents("jugada3.txt", ',', FILE_APPEND);
				} else {
					file_put_contents("jugada3.txt", "|", FILE_APPEND);
				}
			}
		}
		return $tabla;
	} else {
		$file=explode("|", file_get_contents("jugada3.txt"));
		//print_r($file);
		foreach ($file as $f => $fila)
		{
			$columna=explode(",", $fila);
			foreach ($columna as $c => $celda)
			{
				//echo "<pre>".($f+1)."X".($c+1)."='".$celda."', '-'</pre>";
				if ($f<3)
				{
					$tabla[($f+1)][($c+1)]=$celda;
				}
			}
		}
		return $tabla;
	}
}
/**
 * 
 * @param unknown_type $tabla
 * @param unknown_type $jugador
 * @return boolean|string
 */
function pinta($tabla, $jugador)
{
	if ($_POST)
	{
		if ($jugador=="X")
		{
			//print_r($_POST);
			$posicion=explode("X", $_POST['casilla']);
			$columna=$posicion[1];
			$fila=$posicion[0];
		} else {
			$columna=rand(1,3);
			$fila=rand(1,3);
			$n=0;
			while (($n<10) && $tabla[$fila][$columna]!='-')
			{
				$columna=rand(1,3);
				$fila=rand(1,3);
				$n++;
			}
		}

		//echo "FIN X = Celda: ".$fila."X".$columna.", valor: '".$tabla[$fila][$columna]."'<br />\n";
		//print_r($tabla[$fila][$columna]);
		if ($tabla[$fila][$columna]!='-')
		{
			return $tabla;
		} else
		{
			if ($jugador=="X")
			{
				$tabla[$fila][$columna]='X';
			} else
			{
				$tabla[$fila][$columna]='0';
			}
			return $tabla;
		}
	} else
	{
		return $tabla;
	}
}
/**
 * 
 * @param unknown_type $tabla
 * @return unknown
 */
function guardarPartida($tabla)
{
	if ($_POST)
	{
		file_put_contents("jugada3.txt", "" );
		foreach ($tabla as $f => $fila)
		{
			foreach ($fila as $c => $celda)
			{
				//print_r($celda);
				file_put_contents("jugada3.txt", $celda, FILE_APPEND);
				if ($c!=3)
				{
					file_put_contents("jugada3.txt", ',', FILE_APPEND);
				} else
				{
					file_put_contents("jugada3.txt", "|", FILE_APPEND);
				}
			}
		}
		return $tabla;
	}
}
/**
 * 
 * @param unknown_type $matriz
 * @param unknown_type $signo
 * @return boolean
 */
function gana($matriz, $signo)
{
	$filas=3;
	$columnas=3;
	for($i=1;$i<=$filas;$i++)
	{
		for($b=1;$b<=$columnas;$b++)
		{
			if($matriz[$i][$b]==$signo)
			{
				if(isset($matriz[$i-2][$b]) && $matriz[$i-1][$b]==$signo && $matriz[$i-2][$b]==$signo)
					return true;
				if(isset($matriz[$i+2][$b]) && $matriz[$i+1][$b]==$signo && $matriz[$i+2][$b]==$signo)
					return true;
				if(isset($matriz[$i][$b+2]) && $matriz[$i][$b+1]==$signo && $matriz[$i][$b+2]==$signo)
					return true;
				if(isset($matriz[$i][$b-2]) && $matriz[$i][$b-1]==$signo && $matriz[$i][$b-2]==$signo)
					return true;
				if(isset($matriz[$i+2][$b+2]) && $matriz[$i+1][$b+1]==$signo && $matriz[$i+2][$b+2]==$signo)
					return true;
				if(isset($matriz[$i+2][$b-2]) && $matriz[$i+1][$b-1]==$signo && $matriz[$i+2][$b-2]==$signo)
					return true;
				if(isset($matriz[$i-2][$b-2]) && $matriz[$i-1][$b-1]==$signo && $matriz[$i-2][$b-2]==$signo)
					return true;
				if(isset($matriz[$i-2][$b+2]) && $matriz[$i-1][$b+1]==$signo && $matriz[$i-2][$b+2]==$signo)
					return true;
			}
		}
	}
	return false;
}
/**
 * 
 * @param unknown_type $matriz
 * @return boolean
 */
function tablas($matriz)
{
	$tablas=true;
	print_r($matriz);
	foreach ($matriz as $fila) {
		if (in_array('-', $fila))
		{
			$tablas=false;
		}
	}
	if ($tablas==false)
	{
		return false;
	} else
	{
		return true;
	}
}




