<?php 

/**
 * Read config file to array
 * @param string $configFile Config filename
 * @param string $context Context
 * @return array: Config context array
 */
function readConfig($configFile, $context)
{	
	$arrayConfig = parse_ini_file($configFile, true);

	//Check complete config data
	foreach ($arrayConfig as $key => $value) {
		//Check array with the selected context
		if (strpos($key, $context)===0){
			//take inheritance options
			$inheritance=explode (":", $key);
			//merge arrays
			if (isset($inheritance[1])){
				$arrayConfig=array_merge($arrayConfig[$inheritance[1]],$value);
			}else{
				$arrayConfig=$value;
			}
		}
	}

// 	echo "<pre>";
// 	print_r($arrayConfig);
// 	echo "</pre>";
// 	die();
	return $arrayConfig;
}