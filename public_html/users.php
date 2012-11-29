<?php 
define ('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

require_once("../application/models/applicationModel.php");
require_once("../application/models/usersModel.php");

$config = readConfig('../application/configs/config.ini', 'production');

// Inicializaciones
$arrayUser=initArrayUser();


if(isset($_GET['action']))
	$action=$_GET['action'];
else
	$action='select';


switch($action)
{
	case 'update':
// 		die("esto es update");
		if ($_POST)
		{
 			$imageName=updateImage($_FILES, $_GET['id'], $config['filename'], $config['uploadDirectory']);
			updateToFile($imageName, $_GET['id'], $config['filename']);
			header ("Location: users.php?action=select");
			exit();
		}
		else
		{
			$arrayUser=readUser($_GET['id'], $config['filename']);		
		}

	case 'insert':
		if($_POST)
		{
			$imageName=uploadImage($_FILES, $config['uploadDirectory']);
			writeToFile($imageName, $config['filename']);
			header ("Location: users.php?action=select");
			exit();
		}
		else
		{
			$params['arrayUser']=$arrayUser;
			$content=renderView($config,"formulario",$params);
			//(include("../application/views/formulario.php");
		}
			
	break;
	case 'delete':
		if($_POST)
		{
			if($_POST['submit']=='si')
			{
				deleteUser($_GET['id'], $config['filename']);
				header ("Location: users.php?action=select");
				exit();
			}
			else
			{
				header ("Location: users.php?action=select");
				exit();
			}
				
		}
		else
		{
			//include("../application/views/delete.php");
			//Buffer assigned and flushed
			$content=renderView($config,"delete");
		}
	break;
	case 'select':
		$arrayUsers=readUsersFromFile($config['filename']);	
		$params=array();
		$params['arrayUsers']=readUsersFromFile($config['filename']);	
		
		$content=renderView($config,"select",$params);

	default:
	break; 
}



include('../application/layouts/layout_admin.php');





