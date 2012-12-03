<?php

include("../application/models/3enrayaModels.php");

// Declaramos el valor de mensaje vacío
$msg = "";
// Determinamos si juega primero el humano o el ordenador
$human = TRUE; // TRUE primero el humano / FALSE el ordenador

// Si es la primera jugada
if (!$_POST) {  
    // Preparar un tablero con un array
    $table = preparaTablero();
    // Determinamos si abre el ordenador o el usuario
    if (!$human) {
    juegaOrdenador (&$table);  
    }
// Si es la continuación de la jugada
} else {
    $table = unserialize(urldecode($_POST['table']));
    // Comprobamos que hemos recibido datos correctos
    if (validarDatos ($_POST['x'],$_POST['y']) === TRUE) {
        // Si hay jugada previa del humano recoge el dato del formulario y lo dibuja
        if (!modificaTablero ($table,$_POST['y'],$_POST['x'])) {
            $msg = "<p>Casilla ocupada, pruebe otra.</p>";
        } else {
            if (compruebaLineas ($table) === TRUE) {
                $msg = "<p>Has ganado el juego</p>";
            } else {
                // Juega el ordenador
                juegaOrdenador (&$table);
                if (compruebaLineas ($table) === TRUE) {
                   $msg = "<p>Yo he ganado el juego</p>";
                }
            }
        }
    // Datos erróneos
    } else {
        $msg = "<p>Datos fuera de rango. Vuelva a intentarlo.</p>";
    }
}

include("../application/views/3enrayaView.php");

?>
