<?php
//Definición del tamaño de la tabla
$limitx=10; //tamaño horizontal
$limity=10; //tamaño vertical

//Se genera la primera fila de "Título" para la tabla
echo "<table>\n\t<tr><th> </th>";
for($x=0; $x<=$limitx; $x++) echo "<th>".$x."</th>";
echo "</tr>";

for($y=0; $y<=$limity; $y++)
{
	echo "<tr><th>".$y."</th>";
	for($x=0; $x<=$limitx; $x++) echo "<td>".$x*$y."</td>";
	echo "</tr>";
}
echo "</table>";
?>


<h2>Fibonacci</h2>

<?php
$f1=0; $f2=1;
$limit=48;

echo $f1;
while($f2<=$limit)
{
	echo " - ".$f2;
	$f2=$f2+$f1;
	$f1=$f2-$f1;
}

?>