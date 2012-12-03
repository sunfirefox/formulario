<?php

require_once("../application/models/4inrow.php");


if(isset($_GET['action']))
{
	$action=$_GET['action']; // la variable se pasa en la url
}
else
{
	$action='show';
}

switch($action)
{
	case 'insert':
		if($_POST)
		{
			// Insert user new coin
			$ok = insertUserCoin($board);
			
			// Test if game has ended
			
			// Insert computer coin

			// Test if game has ended

			// Write board
			writeBoard($board);
			
			// Show user current status
			header("Location: controller.php?action=show");
			exit();
		}		
		else
		{
			include("../application/views/4inrowform.php");
		}
		break;
	case 'show':
		// Read board
		$board = readBoard();
		print_r($board);
		die();
		if(count($board) == 0)
		{
			echo "Hola";
			die();
			initializeBoard($board);
		}
		include("../application/views/4inrowform.php");
		break;
	default:
		break;
}