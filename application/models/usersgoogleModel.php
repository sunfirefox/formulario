<?php

/**
 * 
 * @param unknown_type $cnx
 * @return $listFeed
 */
function getUsersList($spreadsheetService, $config)
{
	$query = new Zend_Gdata_Spreadsheets_ListQuery();
    $query->setSpreadsheetKey($config['google.spreadsheetKey']);
    $query->setWorksheetId($config['google.worksheetID']);
    $listFeed = $spreadsheetService->getListFeed($query);
	
	return $listFeed;
}


/**
 * 
 * @param unknown_type $cnx
 * @return unknown
 */
function readUsers($spreadsheetService, $config)
{
    $listFeed=getUsersList($spreadsheetService, $config);

	$arrayUsers=$listFeed->entries;
	
	return $arrayUsers;
}

/**
 * 
 * @param unknown_type $id
 * @param unknown_type $cnx
 * @return unknown
 */
function readUser($id, $spreadsheetService, $config)
{
	$listFeed=getUsersList($spreadsheetService, $config);
	$listEntry=$listFeed->entries[$id];
	//$user=$listEntry->getCustom();
	
	$arrayUser=array();
	
	foreach ($listEntry->getCustom() as $key => $value){
		$arrayUser[$key]=$value->getText();
	}
	
	return $arrayUser;
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
function updateUser($id, $_POST, $imageName, $spreadsheetService, $config)
{
	//Data...
	foreach($_POST as $key => $value)
	{
		if(is_array($value))
			$value=implode(',',$value);	
		$arrayUser[$key]=$value;	
	}
	unset($arrayUser["submit"]);
	$arrayUser['photo']=$imageName;

	//Entry
	$listFeed=getUsersList($spreadsheetService, $config);
	$listEntry=$listFeed->entries[$id];
	//$user=$listEntry->getCustom();
	
	$updatedListEntry = $spreadsheetService->updateRow($listEntry,
                                                       $arrayUser);

	return $numRows;
}

/**
 * 
 * @param unknown_type $id
 * @param unknown_type $cnx
 * @return unknown
 */
function deleteUser($id, $spreadsheetService, $config)
{
	$listFeed=getUsersList($spreadsheetService, $config);
	$listEntry=$listFeed->entries[$id];

	//delete image
	//$user=$listEntry->getCustom();
    $image = $listEntry->getCustomByName('photo')->getText();
	deleteImage($image);
	
	$listEntry->delete();
}