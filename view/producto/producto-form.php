
<h1><?=$titulo?></h1>
	<form action="?c=producto&a=Guardar" method="POST"  enctype="multipart/form-data">
	<input type="hidden" name="ID"  value="<?=$p->getPro_id()?>">
		<article>
			<label>Nombre</label>
            <input type="text" id="Nombre" name="Nombre" required="required" value="<?=$p->getPro_nom()?>">
		</article>

        <article> 
			<label  for="Costo">Costo</label>
			<div >
				<input type="text" id="Costo" name="Costo" required="required" value="<?=$p->getPro_cos()?>">
			</div>
		</article>

        <article>
            <br>
			<div>
				<textarea id="Descripcion" name="Descripcion" required="required" placeholder="Descripción"><?=utf8_encode($p->getPro_desc())?></textarea>
			</div>
		</article>
        
		<article>
			<div >
			<input type="submit" id="Añadir" name="Añadir" value="<?=$titulo?>">
			</div>
            <div>
                <a href="?c=producto">Cancelar</a>
			</div>
		</article>
	</form>