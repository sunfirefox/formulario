<?php
require_once("../application/models/juegosModel.php");

$action='';

if(isset($_GET['action']))
    $action=$_GET['action'];

switch($action)
{
	case '3':
            if($_POST)
            {
                /*echo "<pre>";
                print_r($_POST);
                echo "/<pre>";*/

                $arrayTabla=recuperaDatosArray($_POST, $action);
                $texto=insertaValorArray($arrayTabla, $_POST['fila'], $_POST['columna'], $action);
                $arrayJugada=compruebaJugada($action, $arrayTabla);
                $texto_jugada=$arrayJugada[0];
                $estado=$arrayJugada[1];
                if(!$estado) $arrayTabla=juegaOrdenador($action, $arrayTabla);

                /*echo "<pre>";
                print_r($arrayTabla);
                echo "/<pre>";*/

                include("../application/views/tresenraya.php");
                exit();
            }
            else
            {
                // Inicializacion de la matriz de datos
                $arrayTabla=initArrayTabla($action);
                $texto="";
                $texto_jugada="";
                include("../application/views/tresenraya.php");
            }

            break;

	case '4':
            if($_POST)
            {
                /*echo "<pre>";
                print_r($_POST);
                echo "/<pre>";*/

                $arrayTabla=recuperaDatosArray($_POST, $action);
                $texto=insertaValorArray4($arrayTabla, $_POST['columna'], $action);
                $arrayJugada=compruebaJugada($action, $arrayTabla);
                $texto_jugada=$arrayJugada[0];
                $estado=$arrayJugada[1];
                if(!$estado) $arrayTabla=juegaOrdenador($action, $arrayTabla);

                /*echo "<pre>";
                print_r($arrayTabla);
                echo "/<pre>";*/

                include("../application/views/cuatroenlinea.php");
                exit();
            }
            else
            {
                // Inicializacion de la matriz de datos
                $arrayTabla=initArrayTabla($action);
                $texto="";
                $texto_jugada="";
                include("../application/views/cuatroenlinea.php");
            }

            break;
        
	default:
            echo "<p style='font-size:20px;'>Selecciona juego!!!</p>";
            break;
}

?>

