
<form method="POST"
	enctype="multipart/form-data">
<ul>
<li>
Id:<input type="hidden" name="id" value="1" />
</li>
<li>
Nombre:<input type="text" name="name" value="<?=$params['arrayUser'][1];?>"/>
</li>
<li>
Email:<input type="text" name="email" value="<?=$params['arrayUser'][2];?>"/>
</li>
<li>
Password:<input type="password" name="password"/>
</li>
<li>
Descipcioón:<textarea rows="6" cols="6" name="description"><?=$params['arrayUser'][4];?></textarea>
</li>
<li>
Mascotas:<select multiple name="pet[]">
		<option value="cat" <?=(strpos($params['arrayUser'][5],'cat')===FALSE)?'':'selected'; ?>>Gato</option>
		<option value="dog" <?=(strpos($params['arrayUser'][5],'dog')===FALSE)?'':'selected'; ?>>Perro</option>
		<option value="tiger" <?=(strpos($params['arrayUser'][5],'tiger')===FALSE)?'':'selected'; ?>>Tigre</option>
		</select>
</li>
<li>
Ciudad:<select name="city">
		<option value="zrg" <?=($params['arrayUser'][6]=='zrg')?'selected':'';?>>Zaragoza</option>
		<option value="bcn" <?=($params['arrayUser'][6]=='bcn')?'selected':'';?>>Barcelona</option>
		<option value="blb" <?=($params['arrayUser'][6]=='blb')?'selected':'';?>>Bilbao</option>
		</select>
</li>
<li>
Lenguaje: Java <input type="radio" name="coder" value="java" <?=($params['arrayUser'][7]=='java')?'checked':'';?>/>
		  php <input type="radio" name="coder" value="php" <?=($params['arrayUser'][7]=='php')?'checked':'';?>/>
</li>
<li>
Idiomas: Inglés <input type="checkbox" name="languages[]" value="en" <?=(strpos($params['arrayUser'][8],'en')===FALSE)?'':'checked'; ?>/>
		 Castellano <input type="checkbox" name="languages[]" value="es" <?=(strpos($params['arrayUser'][8],'es')===FALSE)?'':'checked'; ?>/>
</li>
<li>
Foto: <input type="file" name="photo"/>
	  <?php if(isset($params['arrayUser'][10])):?>
	  	<img src="<?=$config['imagesDirectory']."/".$params['arrayUser'][10];?>" style="width:150px;"/>
	  <?php endif;?>
</li>
<li>
Submit: <input type="submit" name="submit"/>
</li>
<li>
Reset: <input type="reset" name="reset"/>
</li>


</ul>
</form>

