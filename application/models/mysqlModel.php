<?php

function connect($config)
{
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
		echo $e->GetMessage();
	}
	
	return $db_connection;
}

function disconnect($cnx)
{
	return FALSE/TRUE;
}

function query($sql,$cnx)
{
	try 
	{
		
		$result=mysql_query($sql, $cnx);
		if (!$result)
		{
			throw new Exception('MySQL Query Error: ' . mysql_error());
		}
		else
		{
			if(is_resource($result))
				while($row=mysql_fetch_array($result,MYSQL_ASSOC))
				{
					$arrayData[]=$row;
				}
			else
				$arrayData[]=$result;
		}
	}
	catch (Exception $e)
	{
		echo $e->GetMessage();
	}
	
	
	return $arrayData;
}
