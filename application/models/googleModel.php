<?php

/**
 * Connection
 * @param unknown_type $config
 * @return unknown
 */
function connect($config)
{
	$client=Zend_Gdata_ClientLogin::getHttpClient(
			$config['google.user'],
			$config['google.pass'],
			Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME);
	$spreadsheetService = new Zend_Gdata_Spreadsheets($client);

	try
	{
		$client=Zend_Gdata_ClientLogin::getHttpClient(
					$config['google.user'],
					$config['google.pass'],
					Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME);
		$spreadsheetService = new Zend_Gdata_Spreadsheets($client);

		if (!$spreadsheetService)
		{
			throw new Exception('Google Docs Connection Error!');
		}
		else
		{
			$CONNECTED = true;
		}
	}
	catch (Exception $e)
	{
		echo $e->getMessage();
	}
	return $spreadsheetService;
}

/**
 * Disconnection
 * @param unknown_type $cnx
 */
function disconnect($cnx)
{
	
}



