<?php
?>
<table border="1">
	<?php for($f=1; $f<=4; $f++) : ?>
	<tr>
		<?php for($c=1; $c<=4; $c++) : ?>
		<td>
			<?= $tabla[$f][$c]; ?>
		</td>
		<?php endfor; ?>
	</tr>
	<?php endfor; ?>
</table>