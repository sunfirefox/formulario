<?php

// echo "<pre>Post:";
// print_r($_POST);
// echo "</pre>";

// echo "<pre>Get:";
// print_r($_GET);
// echo "</pre>";

// echo "<pre>Files:";
// print_r($_FILES);
// echo "</pre>";

/**
 * Upload user image
 * @param array $_FILES Array FILES
 * @return string Image final name
 */
function uploadImage($_FILES)
{
	// TODO: Read from config.ini
	// Cargar foto en uploads
	$uploadDirectory = $_SERVER['DOCUMENT_ROOT']."/uploads";
	
	// if($_FILES['photo']['name'] != "")
		// {
	$destination = $uploadDirectory."/".$_FILES['photo']['name'];
	$filename = $_FILES['photo']['tmp_name'];
	
	$path_parts = pathinfo($destination);
	$name = $path_parts['filename'].".".$path_parts['extension'];
	$i = 0;
	while(in_array($name, scandir($uploadDirectory)))
	{
		$i++;
		$name = $path_parts['filename']."_".$i.".".$path_parts['extension'];
	}
	$destination = $uploadDirectory."/".$name;
	
	move_uploaded_file($filename, $destination);
	// }
	return $name;
}

/**
 * Write user to text file
 * @param string $image Image file name
 */
function writeToFile($imageFileName)
{
	// Create user id
	$fileContent = file_get_contents("users.txt");
	$usersArray = explode("\n", $fileContent);
	//print_r($usersArray);
	$id = 1;
	if(count($usersArray) != 0)
	{
		$maxId = 0;
		foreach($usersArray as $userText)
		{
			$user = explode("|",$userText);
			$userId = intval($user[0]);
			if($maxId < $userId)
			{
				$maxId = $userId;
			}
		}
		$id = $maxId + 1;
	}
	
	
	// Write user
	$fid = fopen("users.txt", "a");
	$arrayData = $_POST;
	// array_pop($arrayData);
	$arrayData['id'] = $id;
	foreach($arrayData as $value)
	{
		if( is_array($value) )
		{
			$value=implode(',', $value);
		}
		$textUser[]=$value;
	}
	$textUser[]=$imageFileName;
	$textUser=implode('|', $textUser);
	fwrite($fid, $textUser.PHP_EOL);
	fclose($fid);
	// file_put_contents("users.txt", $textUser."\r\n", FILE_APPEND);
}

/**
 * Read users from file
 * @return multitype:
 */
function readUsersFromFile()
{
	// TODO: read from config.ini
	$filename="users.txt";
	$usersText=file_get_contents($filename);
	$arrayusers=explode("\n", $usersText);
	return $arrayusers;
}

function readUser($id)
{
	$arrayUsers = readUsersFromFile();
	$arrayUser = $arrayUsers[$id];
	$arrayUser = explode("|",$arrayUser);
	return $arrayUser;
}
