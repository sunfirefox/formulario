<?php

function getContextArray($arrayConfig, $context)
{
	$contextArray = array();

// 	echo "<br/>Searching for: ".$context."<br/>";
	
	// Para cada elemento del array
	foreach($arrayConfig as $key => $value)
	{
		if(strpos($key,$context) === 0)
		{
// 			echo "Iter: ".$key." ".$value."<br/>";
			// Context definition found
			// Check if there is inheritance
			$names = explode(':', $key);
			if( count($names) > 1)
			{
// 				echo "<pre>";
// 				print_r($names);
// 				echo "</pre>";
				// There is inheritance
				$contextArray = array_merge(getContextArray($arrayConfig, $names[1]), $value);
			}
			else
			{
				$contextArray = $value;
			}
		}
	}
	
	return $contextArray;
}

function readConfig($configFile, $context)
{
	$arrayConfig = parse_ini_file($configFile, true);
	
// 	echo "<pre>";
// 	print_r($arrayConfig);
// 	echo "</pre>";
	
	$contextArray = getContextArray($arrayConfig, $context);
	
	return $contextArray;
}