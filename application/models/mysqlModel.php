<?php

/**
 * Connection
 * @param unknown_type $config
 * @return unknown
 */
function connect($config)
{
	$cnx=mysql_connect($config['database.server'],
				  $config['database.user'],
				  $config['database.password']);
	mysql_selectdb($config['database.db']);

	try
	{
		$db_connection = mysql_connect ($config['database.server'],
				  $config['database.user'],
				  $config['database.password']);
		mysql_select_db ($config['database.db']);
		if (!$db_connection)
		{
			throw new Exception('MySQL Connection Database Error: ' . mysql_error());
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
	return $db_connection;
}

/**
 * Disconnection
 * @param unknown_type $cnx
 */
function disconnect($cnx)
{
	
}

/**
 * 
 * @param unknown_type $cnx
 * @param unknown_type $sql
 */
function query($sql, $cnx)
{
	try
	{
		$result=mysql_query($sql);
		if (!$result)
		{
			throw new Exception('MySQL Connection Database Error: ' . mysql_error());
		}
		else
		{
			$arrayData=array();
			while ($row=mysql_fetch_array($result, MYSQL_ASSOC))
			{
				$arrayData[]=$row;
			}
		}
	}
	catch (Exception $e)
	{
		echo $e->getMessage();
	}
	
	return $arrayData;
}


