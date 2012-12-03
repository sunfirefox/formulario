<?php

include("pintarMatriz.php");

function processMine(&$board, $x, $y)
{
	$xmin = $x - 1;
	$ymin = $y - 1;
	$xmax = $x + 1;
	$ymax = $y + 1;
		
	if($xmin < 0) $xmin = 0;
	if($ymin < 0) $ymin = 0;
	if($xmax >= count($board)) $xmax = count($board) - 1;
	if($ymax >= count($board)) $ymax = count($board) - 1;
	
	for( $i = $xmin; $i <= $xmax; ++$i )
	{
		for( $j = $ymin; $j <= $ymax; ++$j )
		{
			if( $i != $x || $j != $y )
			{
				if ($board[$i][$j] != -1)
				{
					$board[$i][$j]++;
// 					echo "<br/>";
// 					pintarMatriz($board, count($board));
// 					echo "<br/>";
				}
			}
		}
	}

// 	if( $xmin > 0)
// 	{
// 		if( $ymin > 0)
// 		{
// 			$board[$xmin][$ymin]++;
// 		}
// 		else
// 		{
			
// 		}
// 	}
}


// Once the board size is set, the rest of parameters are configured accordingly
$maxSize = 7;
$maxMines = ($maxSize * $maxSize) / 2;
$numMines = rand(1, $maxMines);

echo "<br/>";
echo "Board has a size of: ".$maxSize."x".$maxSize." and contains ".$maxMines." mines.";
echo "<br/>";

// TODO: X, Y coordinates are picked randomly
$mineCoords = array(array());
for( $i = 0; $i <$numMines; ++$i )
{
	$mineCoords[$i] = array(rand(0,$maxSize-1), rand(0,$maxSize-1));
}
// Remove duplicates in a multidimensional array
$mineCoords = array_map("unserialize", array_unique(array_map("serialize", $mineCoords)));
// Rebuild array index
$mineCoords = array_values($mineCoords);
// echo "<pre>";
// echo var_dump($mineCoords);
// echo "<pre/>";

// $mineX = array( 2, 4, 6 );
// $mineY = array( 1, 3, 5 );

// TODO: reserve and initialize array of full size directly
$board = array( array() );
for( $i = 0; $i < $maxSize; ++$i )
{
	$boardRow = array();
	for( $j = 0; $j < $maxSize; ++$j )
	{
		$boardRow[$j] = 0;
	}
	
	$board[$i] = $boardRow; 
}

// Mark mines
for( $index = 0; $index < count($mineCoords); ++$index )
{
	$x = $mineCoords[$index][0];
	$y = $mineCoords[$index][1];

	$board[$x][$y] = -1;
}

// Foreach mine add +1 to every position of its 8-neighbourhood
for( $index = 0; $index < count($mineCoords); ++$index )
{
	$x = $mineCoords[$index][0];
	$y = $mineCoords[$index][1];
	
	processMine($board, $x, $y);
}

// Print final result
pintarMatriz($board, $maxSize);
// for( $i = 0; $i < $maxSize; ++$i )
// {
// 	for( $j = 0; $j < $maxSize; ++$j )
// 	{
// 		$value = $board[$i][$j];
// 		echo "$value";
// 	}
	
// 	echo "<br/>"; 
// }
