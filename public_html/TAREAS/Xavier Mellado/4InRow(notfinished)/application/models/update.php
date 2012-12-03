<?php

echo "Update\n";
echo "UserId: ".$id."\n";
die();

$fileContent = file_get_contents("users.txt");
$usersArray = explode("\n", $fileContent);
if(count($usersArray) != 0)
{
	
// 	$index = 0;
// 	$found = false;
// 	while($index < count($usersArray) && !$found)
// 	{
// 		$userText = $usersArray[$index];
// 		$user = explode("|",$userText);
// 		$currentUserId = intval($user[0]);
// 		if($currentUserId == $userId)
// 		{
// 			$found = true;
// 			// Update current user

// 			}
// 		$index++;
// 	}
}