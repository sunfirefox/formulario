<?php


function readUsers($cnx)
{
	$sql="SELECT iduser, name, email, password, description, photo,
				coders, city
		  FROM users
		  INNER JOIN cities ON
				users.cities_idcity=cities.idcity;";
	$arrayUsers=query($sql, $cnx);
	foreach($arrayUsers as $key => $user)
	{
		$arrayUsers[$key]['pets']=implode(',',
									readUserPets($user['iduser'], $cnx));
		$arrayUsers[$key]['languages']=implode(',',
									readUserLanguages($user['iduser'], $cnx));
	}
	
	return $arrayUsers;
	
}
function readUserPets($id, $cnx)
{
	$pets=array();
	$sql="SELECT pet
			FROM users
			LEFT JOIN users_has_pets
			ON users.iduser=users_has_pets.users_iduser
			LEFT JOIN pets
			ON users_has_pets.pets_idpet=pets.idpet
			WHERE iduser=".$id;
	$arrayPets=query($sql, $cnx);
	foreach ($arrayPets as $pet)
	$pets[]=$pet['pet'];
	
	return $pets;
}
function readUserLanguages($id, $cnx)
{
	$languages=array();
	$sql="SELECT language
			FROM users
			LEFT JOIN users_has_languages
			ON users.iduser=users_has_languages.users_iduser
			LEFT JOIN languages
			ON users_has_languages.languages_idlanguage=languages.idlanguage
			WHERE iduser=".$id;
	$arrayLanguages=query($sql, $cnx);
	foreach ($arrayLanguages as $language)
		$languages[]=$language['language'];
	
	return $languages;
}

function readUser($id, $cnx)
{
	return $arrayUser;
}

function insertUser($arrayData, $cnx, $imageName)
{
	$sql="INSERT INTO users SET 
			name = '".$arrayData['name']."',
			email = '".$arrayData['email']."',
			cities_idcity = '".$arrayData['city']."',
			description = '".$arrayData['description']."',
			password = '".$arrayData['password']."',			
			coders = '".$arrayData['coder']."',
			photo = '".$imageName."'
		";
	query($sql, $cnx);
	$sql="SELECT LAST_INSERT_ID() as id";
	$array=query($sql, $cnx);
	$id=$array[0]['id'];
	
	foreach($arrayData['pets'] as $pets)
	{
		$sql="INSERT INTO users_has_pets SET
				users_iduser=".$id.",
				pets_idpet=".$pets['id'];
		query($sql, $cnx);
	}
	
	foreach($arrayData['languages'] as $languages)
	{
		$sql="INSERT INTO users_has_languages SET
				users_iduser=".$id.",
				languages_idlanguage=".$languages['id'];
		query($sql, $cnx);
	}
	
	
	return $id;
	
}

function updateUser($arrayData, $id, $cnx)
{
	return $numRows;
}

function deleteUser($id, $cnx)
{
	return $numRows;
}



function readPets($cnx)
{
	$sql="SELECT idpet AS id, pet AS value
		FROM pets";
	$arrayPets=query($sql, $cnx);
	return $arrayPets;
}
function readLanguages($cnx)
{
	$sql="SELECT idlanguage AS id, language AS value
		FROM languages";
	$arrayLanguages=query($sql, $cnx);
	return $arrayLanguages;
}
function readCoders($cnx)
{
	//FIXME: Normalizar las tablas
	
	$sql="SELECT coder AS id, coder AS value
		FROM coders";
	$arrayCoders=query($sql, $cnx);
	return $arrayCoders;
}
function readCities($cnx)
{
	$sql="SELECT idcity AS id, city AS value
		FROM cities";
	$arrayCities=query($sql, $cnx);
	return $arrayCities;
}










