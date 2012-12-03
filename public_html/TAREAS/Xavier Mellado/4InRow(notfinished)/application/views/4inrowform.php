<!DOCTYPE html>
<html lang="en">
<head>
<title>Formulario</title>
<meta name="robots" content="noarchive,noodp,noydir">
<meta name="description" content="Formulario web">
<meta name="keywords" content="Formulario,Web,PHP">
<meta charset="UTF-8" />
</head>
<body>

	<form action="?action=insert" method="POST"
		enctype="multipart/form-data">
		<?php		
			drawBoard($board);
		?>
		Insert in column:<input type="text" name="column"/>
		<input type="submit" name="submit"/>
		<input type="reset" name="reset"/>
	</form>

</body>
</html>
