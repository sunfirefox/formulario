<?php

/**
 * 
 * @param unknown_type $cnx
 * @return unknown
 */
function readUsers($spreadsheetService, $config)
{
	$query = new Zend_Gdata_Spreadsheets_ListQuery();
    $query->setSpreadsheetKey($config['google.spreadsheetKey']);
    $query->setWorksheetId($config['google.worksheetID']);
    $listFeed = $spreadsheetService->getListFeed($query);

	$arrayUsers=$listFeed->entries;
	
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
function insertUser($_POST, $imageName, $spreadsheetService, $config)
{
	foreach($_POST as $key => $value)
	{
		if(is_array($value))
			$value=implode(',',$value);	
		$arrayUser[$key]=$value;	
	}
	unset($arrayUser["submit"]);
	$arrayUser['photo']=$imageName;
	$inserted=$spreadsheetService->insertRow($arrayUser,
                                       $config['google.spreadsheetKey'],
                                       $config['google.worksheetID']);
	return $inserted;
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