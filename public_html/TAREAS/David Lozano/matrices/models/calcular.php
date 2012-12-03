
<?php

//Cálculo de matriz traspuesta respecto a una matriz 3x3 dada.

//recojo las variables enviadas y las guardo por orden en un array
$array_1=$_GET['linea1A'].$_GET['linea2A'].$_GET['linea3A'];
$array_2=$_GET['linea1B'].$_GET['linea2B'].$_GET['linea3B'];
$array_3=$_GET['linea1C'].$_GET['linea2C'].$_GET['linea3C'];

//compruebo que son numeros


//compruebo si la la posición tiene un digito, si no, coloco un cero por defecto.
for ($n=0; $n<3;$n++):
	if (empty($array_1[$n])) $array_1[$n]=0;
	if (empty($array_2[$n])) $array_2[$n]=0;
	if (empty($array_3[$n])) $array_3[$n]=0;
endfor;

//muestro matriz enviada por pantalla
echo "La matriz enviada es: </br>";
echo "| $array_1  |</br>";
echo "| $array_2  |</br>";
echo "| $array_3  |</br>";

//cojo el primer elemento de cada array y los coloco en un nuevo array por orden
for ($n=0; $n<count($array_1);$n++):
	$arrayAux_1=$array_1[$n].$array_2[$n].$array_3[$n];
	$arrayAux_2=$array_1[$n+1].$array_2[$n+1].$array_3[$n+1];
	$arrayAux_3=$array_1[$n+2].$array_2[$n+2].$array_3[$n+2];
endfor;

//muestro en pantalla las matrices ordenadas superpuestas para formar la matriz traspuesta
echo "la matriz traspuesta es: </br>";
echo "| $arrayAux_1 |</br>";
echo "| $arrayAux_2 |</br>";
echo "| $arrayAux_3 |</br>";

?>

