<?php
require_once("../application/models/applicationModel.php");
//equire_once("../application/models/usersModel.php");

$config=readConfig('../application/configs/config.ini', 'development');

if(isset($_GET['game']))
	$game=$_GET['game'];
else
	$game='menu';

switch($game)
{
	case 'tictactoe':
		// 		die("esto es tictactoe");
		include("../application/models/tictactoeModel.php");
		$board=fillBoard();
		if ($_POST)
		{
			$checkWinner=checkWinner($board);
			if($checkWinner=="") $board=serverMove($board);
			else $board["winner"]=$checkWinner;
		}
		include("../application/views/tictactoe.php");
		break;
	case 'connect4':
		include("../application/models/connect4Model.php");
		$board=fillBoard();
		if($_POST)
		{
			$checkWinner=checkWinner($board);
			if($checkWinner=="") $board=serverMove($board);
			else $board["winner"]=$checkWinner;
		}
		include("../application/views/connect4.php");
		break;
	case 'menu':
	default:
		include("../application/views/menu.php");
		break;
}