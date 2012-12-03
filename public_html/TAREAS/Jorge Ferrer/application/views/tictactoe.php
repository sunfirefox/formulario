<?php include '../application/views/_header.php'; ?>

<h2>Tic-Tac-Toe</h2>

<form enctype="multipart/form-data" method="POST" action="?game=tictactoe">
<table class="tictactoe">
  <?php if(isset($board['winner'])): ?>
  <thead>
	<tr><td colspan="3"><h3>The Winner is <?=$board['winner'] ?></h3></td></tr>
  </thead>
  <?php endif; ?>
  <tbody>
  <?php for($x=1;$x<=3;$x++):?>
	<tr>
	<?php for ($y=1; $y<=3; $y++):?>
		<td class="row<?=$x?> col<?=$y?>">
			<?php if($board[$x][$y]!=""):?>
			<input type="text" name="cell<?=$x.$y ?>" value="<?=$board[$x][$y] ?>" readonly="readonly" class="cell" />
			<?php elseif(!isset($board['winner'])):?>
			<input type="submit" name="cell<?=$x.$y ?>" value="X" />
			<?php endif;?>
			&nbsp;
		</td>
	<?php endfor;?>
	</tr>
  <?php endfor;?>
  </tbody>
  <tfoot>
	<tr>
		<td colspan="3">
		</td>
	</tr>
  </tfoot>
</table>
</form>

<?php include '../application/views/_footer.php'; ?>