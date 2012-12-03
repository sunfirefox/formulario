<?php

class MChess
{


function getdata()
{
	$pos = array(
		"n" => array(
		"t1" => 57, "c1" => 58, "a1" => 59, "d" => 60, "r" => 61, "a2" => 62, "c2" => 63, "t2" => 64,
		"p1" => 49, "p2" => 50, "p3" => 51, "p4" => 52, "p5" => 53, "p6" => 54, "p7" => 55, "p8" => 56
		),
		"b" => array(
		't1' => 1, 'c1' => 2, 'a1' => 3, 'd' => 4, 'r' => 5, 'a2' => 6, 'c2' => 7, 't2' => 8,
		'p1' => 9, 'p2' => 10, 'p3' => 11, 'p4' => 12, 'p5' => 13, 'p6' => 14, 'p7' => 15, 'p8' => 16
		));
//	foreach($pos['b'] as &$val) $val = null;
//	foreach($pos['n'] as &$val) $val = null;
	foreach(array_keys($pos['b']) as $k) $pos['b'][$k] = null;
	foreach(array_keys($pos['n']) as $k) $pos['n'][$k] = null;
/*
	echo "<hr />";
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
*/
	foreach ($_POST as $key => $val)
	{
		switch ($key)
		{
			case "bt1":
				$pos['b']['t1'] = 1;
				break;
			case "bc1":
				$pos['b']['c1'] = 2;
				break;
			case "ba1":
				$pos['b']['a1'] = 3;
				break;
			case "bd":
				$pos['b']['d'] = 4;
				break;
			case "br":
				$pos['b']['r'] = 5;
				break;
			case "ba2":
				$pos['b']['a2'] = 6;
				break;
			case "bc2":
				$pos['b']['c2'] = 7;
				break;
			case "bt2":
				$pos['b']['t2'] = 8;
				break;
		}
	}
	
	return $pos;
}

}
?>
