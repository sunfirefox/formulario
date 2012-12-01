<?php 
define ('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

set_include_path(get_include_path().PATH_SEPARATOR."../libs/ZendGdata-1.12.0/library");

require_once("../application/models/applicationModel.php");
require_once("../application/models/debugModel.php");
require_once("../application/models/usersModel.php");
//require_once("../application/models/mysqlModel.php");
//require_once("../application/models/usersdbModel.php");
require_once("../application/models/googleModel.php");
require_once("../application/models/usersgoogleModel.php");


require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata_AuthSub');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_Spreadsheets');
Zend_Loader::loadClass('Zend_Gdata_Docs');

$config = readConfig('../application/configs/config.ini', 'production');

//Google connection
$spreadsheetService=connect($config);

// Inicializaciones
$arrayUser=initArrayUser();


if(isset($_GET['action']))
	$action=$_GET['action'];
else
	$action='select';


switch($action)
{
	case 'update':
// 		die("esto es update") ;
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
			$intertion= insertUser($_POST, $imageName, $spreadsheetService, $config);
			
			header ("Location: users.php?action=select");
			exit();
		}
		else
		{
			$params['arrayUser']=$arrayUser;
			$content=renderView($config,"formulario",$params);
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
		//arrayUsers=readUsersFromFile($config['filename']);	
		$params=array();
		$arrayUsers=readUsers($spreadsheetService,$config);
		$params["arrayUsers"]=$arrayUsers;
				
		$content=renderView($config,"select",$params);

	default:
	break; 
}


include('../application/layouts/layout_admin.php');









//_debug($spreadsheetService);







