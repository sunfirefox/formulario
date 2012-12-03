<?php

/**
 * preparaTablero()
 * genera un array de 3x3 como tablero vacío
 * return array
 *
 */
function preparaTablero() {
    $table = array();
    for($y=0; $y < 3; $y++) {
        $table[] = array();
        for($x=0; $x < 3; $x++) {
            $table[$y][$x] = '·';
       }
    }    
    return $table;       
}

/**
 * dibujaTablero($table)
 * $table = array
 * Dibuja una tabla html a partir de un array
 * return boolean
 */
function dibujaTablero($table) {
    echo '<table>';
    foreach($table as $filas) { 
        echo "<tr>";
        foreach($filas as $value) {
            echo '<td>';
            echo $value;
            echo "</td>";   
        }
        echo "</tr>";
        }
    echo "</table>";
    return TRUE;
}

/**
 * modificaTablero (&$table,$y,$x)
 * Modifica un array en función de las coordenadas recibidas. Utilizado en la jugada de humanos
 * &$table = array modificado por referencia
 * $x = eje X
 * $y = eje Y
 * return boolean
 */
function modificaTablero (&$table,$y,$x) {
    if ($table[$y][$x] == "·") {
        $table[$y][$x] = "X";
        return TRUE;
    } else {
        return FALSE;
    }
}

/**
 * juegaOrdenador (&$table)
 * Pasamos por referencia el tablero y el ordenador realiza su jugada. Aleatoria :-)
 * &$table = array modificado por referencia
 * return boolean
 */
function juegaOrdenador (&$table) {
    $x = rand(0,2);
    $y = rand(0,2);
    if ($table[$y][$x] != '·') {
        juegaOrdenador ($table);
    } else {
        $table[$y][$x] = 'O';
    }
    return TRUE;
}

/**
 * compruebaLineas ($table)
 * Comprueba si en el tablero hay algún 3 en raya
 * $table = array
 * return booleano
 *
 */
function compruebaLineas ($table) {
    $value = FALSE;
    // Compruebas las filas
    foreach ($table as $lin) {
        if (($lin[0] == $lin[1] && $lin[1] == $lin[2]) && ($lin[0] != "·")) {
            $value = TRUE;
        }
    }
    // Comprueba las columnas
    for ($a = 0; $a < 3; $a++) {
        if ($table[0][$a] == $table[1][$a] && $table[1][$a] == $table[2][$a] && ($table[0][$a] != "·")) {
            $value = TRUE;
        }
    }
    // Comprueba las diagonales
        if (($table[0][0] == $table[1][1] && $table[1][1] == $table[2][2]) ||
            ($table[0][2] == $table[1][1] && $table[2][0] == $table[1][1])
            && ($table[1][1] != "·"))  {
        $value = TRUE;
    }
    return $value;    
}

/**
 * validarDatos ($x,$y)
 * Comprueba si el rango de valores introducido es válido
 * $x = string
 * $y = string
 * return booleano
 *
 */
function validarDatos ($x,$y) {
    if ($x == '' || $y == '' || $x < 0 || $x > 2 || $y < 0 | $y > 2 ) {
        return FALSE;
    } else {
        return TRUE;
    }
}

?>