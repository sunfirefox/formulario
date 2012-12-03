
<a href="?action=insert">Agregar</a>
<table border=1>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>email</th>
		<th>password</th>
		<th>description</th>
		<th>pet</th>
		<th>code</th>
		<th>language</th>
		<th>submit</th>
		<th>photo</th>
		<th>Action</th>

	<!-- La variable $arrayusers no esta definida porqeu su contenido puede venir de un fichero, base de datos, etc. -->
	<?php foreach ( $arrayusers as $key => $user ): ?>
		<tr>
		<?php
		$user = explode ( "|", $user );
		$userId = intval($user[0]);
		foreach ( $user as $value ) :
			?>
			<td>
			<!-- El short tag es igual al echo -->
			<?php
				if(empty($value))
				{
					echo '&nbsp';
				}
				else
				{
					echo "$value";
				}
			?>
			</td>
		<?php endforeach; ?>
		<td>
			<a href="?action=update&id=<?=$key?>">Editar</a>
			<a href="?action=delete&id=<?=$key?>">Borrar</a>
		</td>
		</tr>
	<?php endforeach; ?>
</table>
