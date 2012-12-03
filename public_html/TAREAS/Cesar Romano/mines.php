<!DOCTYPE html>
<html>
<head>
<title>Miniminas</title>
<style>
	TD {
		background: #ddd;
		position: relative;
		width: 20px;
		height: 20px;
		text-align: center;
	}
</style>
</head>
<body>
	<table border=1>
	<?php
		$N = 7; $N2 = $N * $N;
		$MAX_MINES = $N2/2;
		$MINES = rand($N, $MAX_MINES);
		$mines = array_rand(range(0,$N2-1),$MINES);
		
		$countmines = array();
		$countmines = array_fill(0, $N2, 0);
		foreach ($mines as $val)
		{
			$pos = array($val+1, $val-1, $val-$N-1, $val-$N, $val-$N+1, $val+$N-1, $val+$N, $val+$N+1);
			foreach ($pos as $k)
			{
				if (($val % $N == 0) && (($k+1) % $N == 0)) continue;
				if ((($val+1) % $N == 0) && (($k) % $N == 0)) continue;
				if (array_key_exists($k, $countmines)) $countmines[$k]++;
			}
		}
			
		foreach($countmines as $i => $val)
		{
			if ($i%$N==0) print "\n\t<tr>";
			print "<td>" . ((in_array($i, $mines))? "*" : $val) . "</td>";
			if (($i+1)%$N==0) print "</tr>";
		} 
		print "\n";
	?>
	</table>
</body>
</html>
