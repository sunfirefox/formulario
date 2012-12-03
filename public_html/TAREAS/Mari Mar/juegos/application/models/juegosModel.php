<?php

/**
 * Inicializa el array
 * @param $num_fil_col: Numero de filas y columnas
 * @return array: Users array
 */
function initArrayTabla($num_fil_col)
{
	$arrayTabla=array();

        // 3 filas para el tres en raya
        // 4 filas para el cuatro en linea
	for($i=0;$i<$num_fil_col;$i++)
	{
            for($j=0;$j<$num_fil_col;$j++)
            {
                $arrayTabla[$i][$j]=NULL;
            }
	}

	return $arrayTabla;
}

/**
 * Inserta el nuevo valor en el array
 * @param $arrayTabla: Array con la informacion de las casillas rellenas
 * @param $fila: Fila en la que se ha colocado la ficha
 * @param $columna: Columna en la que se ha colocado la ficha
 * @return array: Users array
 */
function insertaValorArray(&$arrayTabla, $fila, $columna, $num_fil_col)
{
   if($fila<1 || $fila>$num_fil_col ||
      $columna<1 || $columna>$num_fil_col)
        return "ERROR: Casilla no existente";

    if($arrayTabla[$fila-1][$columna-1]!=NULL)
    {
        return "ERROR: Casilla ocupada";
    }
    else
    {
        $arrayTabla[$fila-1][$columna-1]="X";

        // Comprobamos si ha ganado el jugador
        // Jugada realizada por el ordenador
        // Comprobamos si ha ganado el ordenador
        // Continuamos con la siguiente jugada
    }

    return "";
}

function insertaValorArray4(&$arrayTabla, $columna, $num_fil_col)
{
    if($columna<1 || $columna>$num_fil_col)
        return "ERROR: Casilla no existente";

    $fila=$num_fil_col-1; // Calculamos la fila
    while($arrayTabla[$fila][$columna-1]!=NULL) $fila--;

    if($fila>3)
    {
        return "ERROR: Columna completa";
    }
    else
    {
        $arrayTabla[$fila][$columna-1]="X";

        // Comprobamos si ha ganado el jugador
        // Jugada realizada por el ordenador
        // Comprobamos si ha ganado el ordenador
        // Continuamos con la siguiente jugada
    }

    return "";
}

/**
 * Inicializa el array
 * @param $arrayTabla: Array con la informacion de las casillas rellenas
 * @param $fila: Fila en la que se ha colocado la ficha
 * @param $columna: Columna en la que se ha colocado la ficha
 * @return array: Users array
 */
function recuperaDatosArray($_POST, $num_fil_col)
{
    if($_POST)
    {
        for($i=0;$i<$num_fil_col;$i++)
        {
                for($j=0;$j<$num_fil_col;$j++)
                {
                    $k=$i+1;
                    $l=$j+1;
                    $arrayTabla[$i][$j]=$_POST["fila_".$k."_col_".$l]; // Incluimos el valor guardado en el campo oculto
                }
        }
    }
    else
    {
       $arrayTabla=initArrayTabla($num_fil_col);
    }

    return $arrayTabla;
}

// Deberia mejorarse y que dependiera del jugador
function compruebaJugada($num_fil_col, $arrayTabla)
{
    // Diagonal principal
    ${"diagonal_1_X"}=0;
    ${"diagonal_1_O"}=0;

    // Diagonal secundaria
    ${"diagonal_2_X"}=0;
    ${"diagonal_2_O"}=0;

    // Recorremos el array para comprobar la jugada realizada y establecer la siguiente
    for($i=0;$i<$num_fil_col;$i++)
    {
        // Filas
        ${"fila_".$i."_X"}=0;
        ${"fila_".$i."_O"}=0;

        // Columnas
        ${"columna_".$i."_X"}=0;
        ${"columna_".$i."_O"}=0;

        // Guardamos los elementos de cada tipo de cada fila
        for($j=0;$j<$num_fil_col;$j++)
        {
            // Recuento por filas
            if($arrayTabla[$i][$j]=="X") ${"fila_".$i."_X"}+=1;
            if($arrayTabla[$i][$j]=="O") ${"fila_".$i."_O"}+=1;

            // Recuento por columnas
            if($arrayTabla[$j][$i]=="X") ${"columna_".$i."_X"}+=1;
            if($arrayTabla[$j][$i]=="O") ${"columna_".$i."_O"}+=1;

            // Recuento de las diagonales
            if($i==$j)
            {
                if($arrayTabla[$i][$j]=="X") ${"diagonal_1_X"}+=1;
                if($arrayTabla[$i][$j]=="O") ${"diagonal_1_O"}+=1;
            }

            if($i+$j==2)
            {
                if($arrayTabla[$i][$j]=="X") ${"diagonal_2_X"}+=1;
                if($arrayTabla[$i][$j]=="O") ${"diagonal_2_O"}+=1;
            }
        }      
    }

    $texto="";
    $estado=FALSE;

    /*$max_valor_X=max(${"diagonal_1_X"}, ${"diagonal_2_X"});
    $max_valor_O=max(${"diagonal_1_O"}, ${"diagonal_2_O"});*/

    // Comprobamos las diagonales
    if(${"diagonal_1_X"}==$num_fil_col || ${"diagonal_2_X"}==$num_fil_col)
    {
        $texto="Ganó el jugador!!!";
        $estado=TRUE;

        return array($texto, $estado);
    }

    // Comprobamos las jugadas del ordenador
    if(${"diagonal_1_O"}==$num_fil_col || ${"diagonal_2_O"}==$num_fil_col)
    {
        $texto="Ganó el ordenador!!!";
        $estado=TRUE;

        return array($texto, $estado);
    }

    // Recorremos el array para comprobar la jugada realizada y establecer la siguiente
    for($i=0;$i<$num_fil_col;$i++)
    {
        // Comprobamos las jugadas del jugador en las diferentes filas
        if(${"fila_".$i."_X"}==$num_fil_col || ${"columna_".$i."_X"}==$num_fil_col)
        {
            $texto="Ganó el jugador!!!";
            $estado=TRUE;

            return array($texto, $estado);
        }

        // Comprobamos las jugadas del ordenador
        if(${"fila_".$i."_O"}==$num_fil_col || ${"columna_".$i."_O"}==$num_fil_col)
        {
            $texto="Ganó el ordenador!!!";
            $estado=TRUE;

            return array($texto, $estado);
        }

        // Valor maximo para el jugador y el ordenador
        /*$max_valor_X=max(${"fila_".$i."_X"}, ${"columna_".$i."_X"});
        if($max_valor_X<$max_valor_fila_X) $max_valor_X=$max_valor_fila_X;

        $max_valor_O=max(${"fila_".$i."_O"}, ${"columna_".$i."_O"});
        if($max_valor_O<$max_valor_fila_O) $max_valor_O=$max_valor_fila_O;*/
    }

}

function juegaOrdenador($num_fil_col, $arrayTabla)
{
    // Le toca jugar al ordenador
    $fila_jugada_O="";
    $columna_jugada_O="";

    for($i=$num_fil_col-1;$i>=0;$i--)
    {
        // Guardamos los elementos de cada tipo de cada fila
        for($j=0;$j<$num_fil_col;$j++)
        {
            // Jugamos en la primera casilla vacia
            // Habria que mejorar el algoritmo
            if($fila_jugada_O=="" && $columna_jugada_O=="" && $arrayTabla[$i][$j]==NULL)
            {
                        $fila_jugada_O=$i;
                        $columna_jugada_O=$j;

                        /*echo "Fila: ".$fila_jugada_O."<br/>";
                        echo "Columna: ".$columna_jugada_O;
                        echo "<br/>";*/
            }
        }
    }

    $arrayTabla[$fila_jugada_O][$columna_jugada_O]="O";

    $arrayComprueba=compruebaJugada($num_fil_col, $arrayTabla);

    return $arrayTabla;
}

?>
