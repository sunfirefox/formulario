<?php
function iniciarPartida() {
	if (!$_POST) {
		file_put_contents("jugada.txt", "" );
		for($f=1; $f<=4; $f++) {
			for($c=1; $c<=4; $c++) {
				file_put_contents("jugada.txt", '&nbsp;', FILE_APPEND);
				$tabla[$f][$c]='&nbsp;';
				if ($c!=4) {
					file_put_contents("jugada.txt", ',', FILE_APPEND);
				} else {
					file_put_contents("jugada.txt", "\n", FILE_APPEND);
				}
			}
		}
		return $tabla;
	} else {
		$file=explode("\n", file_get_contents("jugada.txt"));
		foreach ($file as $f => $fila) {
			$columna=explode(",", $fila);
			foreach ($columna as $c => $celda) {
				if ($f<4) {
					$tabla[($f+1)][($c+1)]=$celda;
				}
			}
		}
		return $tabla;
	}
}

function pintaX($tabla) {
	if ($_POST) {
		$columna=$_POST['casilla'];
		$fila=4;

		while ($fila!=0 && $tabla[$fila][$columna] != '&nbsp;') {
			//echo "X = Celda: ".$fila.", valor: '".$tabla[($fila-1)][$columna]."'<br />\n";
			$fila--;
		}
		//echo "FIN X = Celda: ".$fila.", valor: '".$tabla[($fila-1)][$columna]."'<br />\n";
		if ($fila<0) {
			return false;
		} else {
			$tabla[$fila][$columna]='X';
			return $tabla;
		}
	} else {
		return $tabla;
	}
}

function pinta0($tabla) {
	if ($_POST) {
		$columna=rand(1,4);
		while ($columna==$_POST['casilla']) {
			$columna=rand(1,4);
		}
		$fila=4;

		while ($fila!=0 && $tabla[$fila][$columna] != '&nbsp;') {
			//echo "0 = Celda: ".$fila.", valor: '".$tabla[($fila-1)][$columna]."'<br />\n";
			$fila--;
		}
		//echo "FIN 0 = Celda: ".$fila.", valor: '".$tabla[($fila-1)][$columna]."'<br />\n";
		if ($fila<0) {
			return false;
		} else {
			$tabla[$fila][$columna]='0';
			return $tabla;
		}
	} else {
		return $tabla;
	}
}

function guardarPartida($tabla) {
	if ($_POST) {
		file_put_contents("jugada.txt", "" );
		foreach ($tabla as $f => $fila) {
			foreach ($fila as $c => $celda) {
				file_put_contents("jugada.txt", $celda, FILE_APPEND);
				if ($c!=4) {
					file_put_contents("jugada.txt", ',', FILE_APPEND);
				} else {
					file_put_contents("jugada.txt", "\n", FILE_APPEND);
				}
			}
		}
		return $tabla;
	}
}

function gana($matriz, $signo) {
	$filas=4;
	$columnas=4;
	for($i=1;$i<=$filas;$i++)
	{
		for($b=1;$b<=$columnas;$b++)
		{
			if($matriz[$i][$b]==$signo)
			{
				if(isset($matriz[$i-3][$b]) && $matriz[$i-1][$b]==$signo && $matriz[$i-2][$b]==$signo && $matriz[$i-3][$b]==$signo )
					return true;
				if(isset($matriz[$i+3][$b]) && $matriz[$i+1][$b]==$signo && $matriz[$i+2][$b]==$signo && $matriz[$i+3][$b]==$signo )
					return true;
				if(isset($matriz[$i][$b+3]) && $matriz[$i][$b+1]==$signo && $matriz[$i][$b+2]==$signo && $matriz[$i][$b+3]==$signo)
					return true;
				if(isset($matriz[$i][$b-3]) && $matriz[$i][$b-1]==$signo && $matriz[$i][$b-2]==$signo && $matriz[$i][$b-3]==$signo)
					return true;
				if(isset($matriz[$i+3][$b+3]) && $matriz[$i+1][$b+1]==$signo && $matriz[$i+2][$b+2]==$signo && $matriz[$i+3][$b+3]==$signo)
					return true;
				if(isset($matriz[$i+3][$b-3]) && $matriz[$i+1][$b-1]==$signo && $matriz[$i+2][$b-2]==$signo && $matriz[$i+3][$b-3]==$signo)
					return true;
				if(isset($matriz[$i-3][$b-3]) && $matriz[$i-1][$b-1]==$signo && $matriz[$i-2][$b-2]==$signo && $matriz[$i-3][$b-3]==$signo)
					return true;
				if(isset($matriz[$i-3][$b+3]) && $matriz[$i-1][$b+1]==$signo && $matriz[$i-2][$b+2]==$signo && $matriz[$i-3][$b+3]==$signo)
					return true;
			}
		}
	}
	return false;
}




