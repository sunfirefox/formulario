<?php

function factorial( $x )
{
	$result = 1;
	
	if($x > 1)
	{
		$result = $x * factorial($x-1); 
	}
	
	return $result; 
}

function combinatorial( $n, $k )
{
	return factorial($n) / (factorial($k) * factorial($n-$k));
}

function TestCombinatorial()
{
	$n = 6;
	$k = 2;

	$result = combinatorial($n, $k);
	
	echo "<br/>Combinatorial C(".$n.", ".$k.") = ".$result."<br/>";
}