<?php
?>
<form action="#" method="POST" >
	<label for="casilla">
		Seleccione la casilla (izquierda a derecha)
	</label>
	<select name="casilla">
		<?php for($c=1; $c<=4; $c++) : ?>
		<option value="<?= $c; ?>">
			<?= $c; ?>
		</option>
		<?php endfor; ?>
	</select>
	<input type="submit" name="insertar" />
</form>