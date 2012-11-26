<?php 

/**
 * Read config file to array
 * @param string $configFile Config filename
 * @param string $context Context
 * @return array: Config context array
 */
function readConfig($configFile, $context)
{	
	$arrayConfig = array();
	
	$arrayConfig = parse_ini_file($configFile, true);
	
	
	
// 	echo "<pre>";
// 	print_r($arrayConfig);
// 	echo "</pre>";
// 	die;
	return $arrayConfig;
}