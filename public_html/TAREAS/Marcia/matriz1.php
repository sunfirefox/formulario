
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>


<form action="matriz2.php" method="POST"> 
		
<?php

$matriz=array();
$filas = 3;
$columnas = 3;

echo "Introduzca los valores de la matriz";

echo "<br/> <br/>";

echo "<table border='3' cellpadding='20'>";
for($i=0; $i < $filas; $i++)
{
echo "<tr>";
	for($j=0; $j < $columnas; $j++)
	{
		echo "<td>";
		$name = "C".$j.$i; 
		//print ($name);
		echo "<input type=\"text\" name=\"$name\" size=2 maxlength=2 style=\"text-align:center\"/>";
		echo "</td>";
	}
echo "</tr>";
}
echo "</table>";
	
?>
<br/><br/>
<input type="submit" value="Transponer" name="submit"/>
<br/><br/>
<input type="reset" name="reset"/>

</form>

</body>		
		
</html>
