<?php include '../application/views/_header.php'; ?>

<h2>Connect 4</h2>

<form enctype="multipart/form-data" method="POST" action="?game=connect4">
<table class="connect4">
  <?php if(isset($board['winner'])): ?>
  <thead>
	<tr><td colspan="7"><h3>The Winner is <?=$board['winner'] ?></h3></td></tr>
  </thead>
  <?php endif; ?>
  <tbody>
  <?php for($x=0;$x<=6;$x++):?>
	<tr>
	<?php for ($y=1; $y<=7; $y++):?>
	  <?php if ($x==0):?>
		<td class="header">
			<?php if(!isset($board['winner'])): //TODO: if column NOT filled?>
			<input type="submit" name="column<?=$y ?>" value="X" />
			<?php endif;?>
			&nbsp;
		</td>
	  <?php else: ?>
		<td>
			<?php if($board[$x][$y]!=""):?>
			<input type="text" name="cell<?=$x.$y ?>" value="<?=$board[$x][$y] ?>" readonly="readonly" class="cell" />
			<?php else:?>
			&nbsp;
			<?php endif;?>
		</td>
	  <?php endif;?>
	<?php endfor;?>
	</tr>
  <?php endfor;?>
  </tbody>
  <tfoot>
	<tr>
		<td colspan="7">
		</td>
	</tr>
  </tfoot>
</table>
</form>

<?php include '../application/views/_footer.php'; ?>