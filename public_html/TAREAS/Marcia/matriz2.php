
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

		
<?php

$matriz=array();
$filas = 3;
$columnas = 3;

//$test = $_POST['C00'];
//echo $test;


$matriz[0][0] = $_POST['C00'];
$matriz[1][0] = $_POST['C10'];
$matriz[2][0] = $_POST['C20'];

$matriz[0][1] = $_POST['C01'];
$matriz[1][1] = $_POST['C11'];
$matriz[2][1] = $_POST['C21'];

$matriz[0][2] = $_POST['C02'];
$matriz[1][2] = $_POST['C12'];
$matriz[2][2] = $_POST['C22'];


echo "<br/>";
echo "matriz transpuesta resultante";
echo "<br/>";
echo "<br/>";
echo "<table border='3' cellpadding='25'>";
for($i=0; $i < $filas; $i++)
{
	echo "<tr>";
	for($j=0; $j < $columnas; $j++)
	{
		echo "<td>".$matriz[$i][$j]."</td>";
	}
	echo "</tr>";
}
echo "</table>";

?> 		


</body>		
		
</html>
