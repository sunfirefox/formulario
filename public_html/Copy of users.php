<?php

$filename="users.txt";

$usersText=file_get_contents($filename);

// Dividir el string por lineas
$arrayusers=explode("\n",$usersText);

echo "<a href=\"formulario.php\">agregar</a>";
echo "<table border=1>";
	echo "<tr>";
		echo "<th>id</th>";
		echo "<th>name</th>";
		echo "<th>email</th>";
		echo "<th>password</th>";
		echo "<th>description</th>";
		echo "<th>pet</th>";
		echo "<th>code</th>";
		echo "<th>language</th>";
		echo "<th>submit</th>";
		echo "<th>photo</th>";
		echo "<th>Action</th>";
	echo "</tr>";
	foreach($arrayusers as $users)
	{
		echo "<tr>";
		$user=explode("|",$users);
		foreach ($user as $value)
		{
			echo "<td>";
			echo $value;
			echo "</td>";
		}
		echo "<td>";
			echo "<a href=\"#\">Editar</a>";
			echo "<a href=\"#\">Borrar</a>";
		echo "</td>";
		echo "</tr>";
	}
echo "</table>";
		


// Dividir las lineas por columnas


// Dibujar tabla