<?php
?>
<form action="#" method="POST" >	
<?php
?>
	<table border="1">
		<?php for($f=1; $f<=3; $f++) : ?>
		<tr>
			<?php for($c=1; $c<=3; $c++) : ?>
			<td>
				<?php if($tabla[$f][$c]=='-') : ?>
					<input type="radio" name="casilla" value="<?= $f."X".$c; ?>"/>
				<?php else: ?>
					<?= $tabla[$f][$c]; ?>
				<?php endif; ?>
			</td>
			<?php endfor; ?>
		</tr>
		<?php endfor; ?>
	</table>
	<?php if($tablas==true || $gana0==true || $ganaX==true) : ?>
		<p>Partida terminada</p>
	<?php else: ?>
		<input type="submit" name="insertar" value="Jugada"/>
	<?php endif; ?>
</form>