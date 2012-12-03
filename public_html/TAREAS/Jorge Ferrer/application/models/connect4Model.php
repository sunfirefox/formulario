<?php
/**
 * Check position
 * @param array $board
 * @return array $board
 */
function checkWinner($board){
	//Check horizontals
	for($y=1;$y<=6;$y++){
		for($x=1;$x<7-3;$x++){
			if ($board[$y][$x]!="" &&
				$board[$y][$x]===$board[$y][$x+1] &&
				$board[$y][$x]===$board[$y][$x+2] &&
				$board[$y][$x]===$board[$y][$x+3]) return $board[$y][$x];
		}
	}
	//Check verticals
	for($x=1;$x<=7;$x++){
		for($y=1;$y<=6-3;$y++){
			if ($board[$y][$x]!="" &&
				$board[$y][$x]===$board[$y+1][$x] &&
				$board[$y][$x]===$board[$y+2][$x] &&
				$board[$y][$x]===$board[$y+3][$x]) return $board[$y][$x];
		}
	}
	//Check diagonals \
	for($x=1;$x<=7-3;$x++){
		for($y=1;$y<=6-3;$y++){
			if ($board[$y][$x]!="" &&
				$board[$y][$x]===$board[$y+1][$x+1] &&
				$board[$y][$x]===$board[$y+2][$x+2] &&
				$board[$y][$x]===$board[$y+3][$x+3]) return $board[$y][$x];
		}
	}
	//Check diagonals \
	for($x=1+3;$x<=7;$x++){
		for($y=1;$y<=6-3;$y++){
			if ($board[$y][$x]!="" &&
				$board[$y][$x]===$board[$y+1][$x-1] &&
				$board[$y][$x]===$board[$y+2][$x-2] &&
				$board[$y][$x]===$board[$y+3][$x-3]) return $board[$y][$x];
		}
	}
	//TODO: $sizeY: for($y=1;$y<=3-$sizeY;$y++)
	//TODO: $sizeX: for($x=1;$x<=3-$sizeX;$x++)
	return false;
}

/**
 * Build board position
 * @return array $board
 */
function fillBoard(){
	//fill Array with positions already in the board
	$board=array();
	for($y=1;$y<=6;$y++){
		$board[$y]=array();
		for ($x=1; $x<=7; $x++){
			if(isset($_POST["cell".$y.$x]) && $_POST["cell".$y.$x]!="")
				$board[$y][$x]=$_POST["cell".$y.$x];
			else $board[$y][$x]="";
		}
	}
	//Add Last movement
	for ($x=1; $x<=7; $x++){
		if(isset($_POST["column".$x]) && $_POST["column".$x]!=""){
			for ($y=6; $y>0; $y--){
				if ($board[$y][$x]=="")
				{
					$board[$y][$x]=$_POST["column".$x];
					break;
				}
			}
		}
	}
	return $board;
}

/**
 * Server Move Calculation
 * @param array $board
 * @return array $board
 */
function serverMove($board){
	//Try to make a random move
	do {
		$x=rand(1, 7);
	} while (!checkLegalMove($board, $x));
	for ($y=6; $y>0; $y--){
		if ($board[$y][$x]=="")
		{
			$board[$y][$x]="O";
			break;
		}
	}
	return $board;
}

/**
 * Check if the move is legal
 * @param array $board
 * @param int $x
 * @param int $y
 * @return bool $result
 */
function checkLegalMove($board, $x){
	for ($y=6; $y>0; $y--){
		if ($board[$y][$x]=="")return true;
	}
}