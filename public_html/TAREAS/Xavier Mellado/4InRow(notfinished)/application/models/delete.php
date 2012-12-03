<?php

echo "Delete\n";

// // $userId contains user id obtained from the url
// if(isset($_GET['userId']))
// {
// 	$userId=$_GET['userId']; // la variable se pasa en la url
// }
// else
// {
// 	exit();
// }
echo "UserId: ".$userId."\n";

$fileContent = file_get_contents("users.txt");
$usersArray = explode("\n", $fileContent);
if(count($usersArray) != 0)
{
	$index = 0;
	$found = false;
	while($index < count($usersArray) && !$found)
	{
		$userText = $usersArray[$index];
		$user = explode("|",$userText);
		$currentUserId = intval($user[0]);
		if($currentUserId == $userId)
		{
			$found = true;
			// Delete current user
			unset($usersArray[$index]);
			// The next sentece is needed if you want to normalize the vector index
			//$usersArray = array_values($usersArray);
		}
		$index++;
	}
	$fileContent=implode("\n", $usersArray);
	file_put_contents("users.txt", $fileContent);
}