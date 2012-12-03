<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo $this->eprint($this->pagetitle); ?></title>
<style>
	TD {
		background: #ddd;
		position: relative;
		width: 48px;
		height: 48px;
		text-align: center;
	}
	TD.white {
		background: #ee6;
	}
	TD.black {
		background: #411;
	}
	DIV.edit {
		width: 190px;
		float: left;
		display:table-cell; 
		vertical-align:middle;
	}
</style>
</head>
<body>
	<div style="float: left">
	<table border=1>
		<tr><td class="none"></td><td class="none">A</td><td class="none">B</td><td class="none">C</td><td class="none">D</td><td class="none">E</td><td class="none">F</td><td class="none">G</td><td class="none">H</td><td class="none"></td></tr>
		<?php for ($i=8; $i>0; $i--): ?>
		<tr>
			<td class="none"><?= $i ?></td>
			<?php for ($j=8; $j>0; $j--): ?>
			<td class="<?= (($i+$j)%2? "black" : "white") ?>">
				<?php $k =1 + (8-$j) + ($i-1)*8; if(array_key_exists($k, $this->figures_on_board)): ?>
					<img src="img/<?= $this->figures_on_board[$k] ?>.png" width="48px" height="48px" title=<?= $k ?> />
				<? endif; ?>
			</td>
			<?php endfor; ?>
			<td class="none"><?= $i ?></td>
		</tr>
		<?php endfor; ?>

		<tr><td class="none"></td><td class="none">A</td><td class="none">B</td><td class="none">C</td><td class="none">D</td><td class="none">E</td><td class="none">F</td><td class="none">G</td><td class="none">H</td><td class="none"></td></tr>
	</table>
	</div>

	<div style="float: left">
		<form method="post" action="chess.php">

		<?php foreach ($this->data as $key => $val): ?>
			<fieldset><legend><?= (($key=='n')? "Negras" : "Blancas") ?></legend>
			<?php foreach ($val as $k => $v): ?>
				<?php if ($k == "p1"): ?>
				<br />
				<?php endif; ?>
				<div class="edit">
					<img src="img/<?= $this->fname[$k] . $key ?>.png" width="48px" height="48px" />
					<input type="checkbox" id="playing" name="<?= "$key$k" ?>" <?= ($v? "checked=\"checked\"" : "") ?> />
					<select name="COLDETAL">
					<?php foreach (array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H') as $ckey => $cval): ?>
						<option <?= (($ckey == ($v-1)%8)? "selected" : "") ?> value="<?= $cval ?>" ><?= $cval ?></option>
					<?php endforeach; ?>
					</select>
					<select name="FILADETAL">
					<?php for($i=7; $i>=0; $i--): ?>
						<option <?= (($i == (int)(($v-1)/8))? "selected" : "") ?> value="<?= $i+1 ?>" ><?= $i+1 ?></option>
					<?php endfor; ?>
					</select>					
				</div>
				
				
			<?php endforeach; ?>
			</fieldset>
			<br />
		<?php endforeach; ?>

		<input type="submit" />
		<input type="reset" />
		</form>
	</div>
	
</body>
</html>
