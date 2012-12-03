<?php

function matrixTranspose( $A )
{
	$T = array();
	
	for($i = 0; $i < count($A); ++$i)
	{
		for($j = 0; $j < count($A[$i]); ++$j)
		{
			$T[$j][$i] = $A[$i][$j]; 
		}
	}
	
	return $T; 
}

function TestTranspose()
{
	$A = array(
			array (1, 2),
			array (3, 4),
			array (5, 6),
			array (7, 8),
			);
	$T = matrixTranspose($A);
	
	echo "<pre>";
	print_r($T);
	echo "</pre>";
}