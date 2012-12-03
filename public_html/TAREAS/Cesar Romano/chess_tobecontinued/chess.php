<?php

// Use the Savant3 template system for view rendering.
require_once 'Savant3.php';
$tpl = new Savant3();

// Get the data from the model:
include_once "MChess.php";
$data = MChess::getdata();

// Type of figure and name of the image file.
$fname = array(
	"t1" => "t", "c1" => "c", "a1" => "a", "d" => "d", "r" => "r", "a2" => "a", "c2" => "c", "t2" => "t",
	"p1" => "p", "p2" => "p", "p3" => "p", "p4" => "p", "p5" => "p", "p6" => "p", "p7" => "p", "p8" => "p"
);
$figures_on_board = array();
foreach ($data as $key => $val)
{
	foreach ($val as $k => $v)
	{
		$figures_on_board[$v] = $fname[$k] . $key;
	}
}

// Set the view data:
$tpl->pagetitle = "Minichess";
$tpl->data = $data;
$tpl->figures_on_board = $figures_on_board;
$tpl->fname = $fname;

// Display the view
$tpl->display('chess.tpl.php');

/*		
	
	
	<hr />
	<div style="float: left">
	<?php
	echo "<pre>";
	var_dump($_POST);
	echo "</pre>";
	?>
	</div>
	
*/
?>
