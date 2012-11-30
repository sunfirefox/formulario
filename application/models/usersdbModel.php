<?php

/**
 * 
 * @param unknown_type $cnx
 * @return unknown
 */
function readUsers($cnx)
{
	$sql="SELECT iduser, name, email, password, description, photo, coders, city
		  FROM users
		  INNER JOIN cities ON
				users.cities_idcity=cities.idcity;";
	$arrayUsers=query($sql,$cnx);

	
	foreach ($arrayUsers as $key => $value)
	{
		$arrayUsers[$key]['pets']=getPetsFromUser($value['iduser'], $cnx);
		$arrayUsers[$key]['languages']=getLanguagesFromUser($value['iduser'], $cnx);
	}
	
	
	return $arrayUsers;
}

/**
 * 
 * @param unknown_type $id
 * @param unknown_type $cnx
 * @return unknown
 */
function readUser($id, $cnx)
{
	return $arrayUser;
}

/**
 * 
 * @param int $iduser
 * @param Conector $cnx
 * @return string $pets
 */
function getPetsFromUser($iduser, $cnx)
{
	$sql="SELECT pet
		  FROM pets
		  INNER JOIN users_has_pets ON
				users_has_pets.pets_idpet=pets.idpet
				WHERE users_has_pets.users_iduser=".$iduser.";";
	$result=query($sql,$cnx);
	//To array
	$arrayPets=array();
	foreach($result as $value) $arrayPets[]=$value['pet'];
	//Format
	$pets=implode(", ", $arrayPets);	
	return $pets;
}

/**
 *
 * @param int $iduser
 * @param Conector $cnx
 * @return string $languages
 */
function getLanguagesFromUser($iduser, $cnx)
{
	$sql="SELECT language
		  FROM languages
		  INNER JOIN users_has_languages ON
				users_has_languages.languages_idlanguage=languages.idlanguage
				WHERE users_has_languages.users_iduser=".$iduser.";";
	$result=query($sql,$cnx);
	//To array
	$arrayLanguages=array();
	foreach($result as $value) $arrayLanguages[]=$value['language'];
	//Format
	$languages=implode(", ", $arrayLanguages);
	return $languages;
}

/**
 * 
 * @param unknown_type $arrayData
 * @param unknown_type $cnx
 * @return unknown
 */
function insertUser($arrayData, $cnx)
{
	return $lastID;
}

/**
 * 
 * @param unknown_type $arrayData
 * @param unknown_type $id
 * @param unknown_type $cnx
 * @return unknown
 */
function updateUser($arrayData, $id, $cnx)
{
	return $numRows;
}

/**
 * 
 * @param unknown_type $id
 * @param unknown_type $cnx
 * @return unknown
 */
function deleteUser($id, $cnx)
{
	return $numrows;
}