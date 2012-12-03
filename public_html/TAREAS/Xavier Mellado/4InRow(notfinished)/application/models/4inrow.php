<?php

// Initialize board
function initializeBoard(&$board)
{
	$rows = 7;
	$cols = 6;

	for($i = 0; $i < $rows; ++$i)
	{
		for($j = 0; $j < $cols; ++$j)
		{
			$board[$i][$j] = 0;
		}
	}
}

// Insert user column
function insertUserCoin(&$board)
{
	$userCol = $_POST['column'];

	$currentArray = $board[$userCol];
	$pos = array_search(0, $currentArray);
	
	if($pos === FALSE)
	{
		echo "Lleno";
		die();
	}
	else
	{
		echo "Columna ".$userCol." fila ".$pos;
		$board[$userCol][$pos] = 1;
		drawBoard($board);
	}
	
	return ($pos === FALSE);
}

function writeBoard($board)
{
	file_put_contents('board.txt', serialize($board));
}

function readBoard()
{
	$res = file_get_contents('board.txt');
	$board = array();

	if($res !== FALSE)
	{
		$board = unserialize($res);
	}

	return $board;
}


// Draw board
function drawBoard($board)
{
	$rows = count($board);
	$cols = count($board[0]);

	echo "<table>";
	for($j = $cols - 1; $j >= 0; --$j)
	{
		echo "<tr>";
		for($i = 0; $i < $rows; ++$i)
		{
			echo "<td>&nbsp&nbsp";
			echo $board[$i][$j];
			echo "&nbsp&nbsp</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}