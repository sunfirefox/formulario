<!DOCTYPE html>
<html>
<head>
	<title>Buscaminas</title>
</head>
<body>
<?php
//Size of the table
$sizex=10; //horizontal size
$sizey=10; //vertical size

//Build and empty table
$table=array();
for ($i = 1; $i <= $sizex*$sizey; $i++) $table[$i]=0;

//Number of de mines
$total_mines=rand(1, $sizex*$sizey/2);

//Populate the table with mines
$placed_mines=0;
while($placed_mines<$total_mines)
{
	$x=rand(1,$sizex*$sizey);
 	if($table[$x]==0)
 	{
		$table[$x]="*";
 		$placed_mines++;
 	}
}

//Populate the table with the numbers
for ($i = 1; $i <= $sizex*$sizey; $i++) {
	if($table[$i]==="*")
	{
		//left square
		if($i%$sizex!=1) $table[$i-1]++;
		//right square
		if($i%$sizex!=0) $table[$i+1]++;
		//upper left square
		if($i%$sizex!=1 && $i>$sizex) $table[$i-$sizex-1]++;
		//upper square
		if($i>$sizex) $table[$i-$sizex]++;
		//upper right square
		if($i%$sizex!=0 && $i>$sizex) $table[$i-$sizex+1]++;
		//lower left square
		if($i%$sizex!=1 && $i<$sizex*$sizey-$sizex) $table[$i+$sizex-1]++;
		//lower square
		if($i<$sizex*$sizey-$sizex) $table[$i+$sizex]++;
		//lower right square
		if($i%$sizex!=0 && $i<$sizex*$sizey-$sizex) $table[$i+$sizex+1]++;
	}
}

echo "<p>Tablero de ".$sizex."x".$sizey." con ".$total_mines." minas</p>";
?>

<style type="text/css">
td{width:20px;padding:5px;}
</style>
<table>
	<tr>
<?php
for ($i = 1; $i <= $sizex*$sizey; $i++) {
	echo "<td>".$table[$i]."</td>";
	if ($i%$sizex==0) {
		echo "</tr>\n<tr>";
	}
}
?>
	</tr>
</table>

</body>