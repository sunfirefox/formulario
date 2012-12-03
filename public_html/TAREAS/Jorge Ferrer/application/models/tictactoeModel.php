<?php
/**
 * Check position
 * @param array $board
 * @return array $board
 */
function checkWinner($board){
	//Check horizontals
	for($y=1;$y<=3;$y++)
		if ($board[$y][1]===$board[$y][2]&& $board[$y][2]===$board[$y][3]) return $board[$y][1];
	//Check verticals
	for($x=1;$x<=3;$x++)
		if ($board[1][$x]===$board[2][$x]&& $board[2][$x]===$board[3][$x]) return $board[1][$x];
	//Check diagonals
		if ($board[1][1]===$board[2][2]&& $board[2][2]===$board[3][3]) return $board[1][1];
		if ($board[1][3]===$board[2][2]&& $board[2][2]===$board[3][1]) return $board[1][3];
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
	for($y=1;$y<=3;$y++){
		$board[$y]=array();
		for ($x=1; $x<=3; $x++){
			if(isset($_POST["cell".$y.$x]) && $_POST["cell".$y.$x]!="")
				$board[$y][$x]=$_POST["cell".$y.$x];
			else $board[$y][$x]="";
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
		$x=rand(1, 3);
		$y=rand(1, 3);
	} while (!checkLegalMove($board, $x, $y));
	$board[$y][$x]="O";
	return $board;
	
}

/**
 * Check if the move is legal
 * @param array $board
 * @param int $x
 * @param int $y
 * @return bool $result
 */
function checkLegalMove($board, $x, $y){
	if($board[$y][$x]!="") return false;
	else return true;
}
