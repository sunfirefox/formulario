<?php

/**
 * Uload image 
 * @param array $_FILES Array FILES
 * @return string Image final name
 */
function uploadImage($_FILES, $config)
{
	$destination = $config['uploadDirectory']."/".$_FILES['photo']['name'];
	$filename = $_FILES['photo']['tmp_name'];
	$path_parts = pathinfo($destination);
	$name=$path_parts['filename'].".".$path_parts['extension'];
	$i=0;
	while(in_array($name,scandir($config['uploadDirectory'])))
	{
		$i++;
		$name=$path_parts['filename']."_".$i.".".$path_parts['extension'];
	}
	$destination = $config['uploadDirectory']."/".$name;
	move_uploaded_file($filename, $destination);
	return $name;
}

/**
 * Update user image
 * @param array $_FILES Files array
 * @param int $id User id
 */
function updateImage($_FILES, $id, $config)
{
	$arrayUser=readUser($id, $config);
	$image=$arrayUser[10];	
// 	Si FILES nueva 
	if(isset($_FILES['photo']['name']))
	{		
// 		borrar imagen		
		$image=str_replace("\r", "", $image);
		$image=str_replace("\n", "", $image);
		unlink($config['uploadDirectory']."/".$image);
// 		subir imagen nueva
		$image=uploadImage($_FILES);
		
	}
// 	de lo contrario
	else
	{ 
// 		no borrar nada
	}
// 	devolver imagen
	return $image;
}

/**
 * White users to .txt file
 * @param string $imageName Image name
 */
function writeToFile($imageName, $config)
{
	foreach($_POST as $value)
	{
		if(is_array($value))
			$value=implode(',',$value);	
		$arrayUser[]=$value;	
	}
	$arrayUser[]=$imageName;
	$textUser=implode('|',$arrayUser);
	file_put_contents($config['filename'], $textUser."\r\n", FILE_APPEND);
}

/**
 * Update users file
 * @param string $imageName Image name
 * @param string $id User id
 */
function updateToFile($imageName, $id, $config)
{
	//Leer los datos del archivo
	$arrayUsers=readUsersFromFile($config);
	foreach($_POST as $value)
	{
		if(is_array($value))
			$value=implode(',',$value);
		$arrayUser[]=$value;
	}
	$arrayUser[]=$imageName;
	$textUser=implode('|',$arrayUser);
	
	$arrayUsers[$id]=$textUser;
	$textUsers=implode("\r\n",$arrayUsers);
	
	file_put_contents($config['filename'], $textUsers);
}

/**
 * Read users from file 
 * @return array: Users array
 */
function readUsersFromFile($config)
{
	$usersText=file_get_contents($config['filename']);
	$arrayUsers=explode("\n",$usersText);	
	return $arrayUsers;
}

/**
 * Read user from file to array
 * @param int $id User id: line number
 * @return array: User array
 */
function readUserFile($id, $config)
{
	$arrayUsers=readUsersFromFile($config);
	$arrayUser=$arrayUsers[$_GET['id']];
	$arrayUser=explode("|",$arrayUser);
	return $arrayUser;
}

/**
 * Inicializa el array de usuarios
 * @return array Users array
 */
function initArrayUser()
{
	$arrayUser=array();
	for ($i=0;$i<11;$i++)
		$arrayUser[$i]=NULL;
	return $arrayUser;
}

/**
 * Delete user from file and image from directory
 * @param int $id User Id
 */
function deleteUserFile($id, $config)
{
// 	Leer el usuario segun id
	$arrayUser=readUser($id,$config);
// 	Tomar la foto
	$image=$arrayUser[10];	

// 		Limpiar el nombre de la foto
		$image=str_replace("\r", "", $image);
		$image=str_replace("\n", "", $image);
// 		Borrar la foto
		unlink($config['uploadDirectory']."/".$image);
	
	
// 	Tomar todos los usuarios
	$arrayUsers=readUsersFromFile($config);
	
// 	Borrar el usuario id
	unset($arrayUsers[$id]);
		
// 	Hacer el string 
	$textUsers=implode("\r\n",$arrayUsers);
	
// 	Reescribir fichero txt
	file_put_contents("users.txt", $textUsers);
}











