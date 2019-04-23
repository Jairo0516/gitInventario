
<h1><?=$titulo?></h1>
	<form action="?c=producto&a=Guardar" method="POST"  enctype="multipart/form-data">
	<input type="hidden" name="ID"  value="<?=$p->getPro_id()?>">
<center>

    <table style="width: 50%;">
        <tr>
            <td>Nombre</td>
            <td><input type="text" id="Nombre" name="Nombre" required="required" value="<?=$p->getPro_nom()?>"></td>
            <td>Costo</td>
            <td><input type="text" id="Costo" name="Costo" required="required" value="<?=$p->getPro_cos()?>"></td>
        </tr>
        <tr >
            <td>Descripción</td>
            <td colspan="3"><textarea id="Descripcion" name="Descripcion" required="required" placeholder="Descripción" style="width: 100%;"><?=utf8_encode($p->getPro_desc())?></textarea></td>
        </tr>
    </table>
    <br>


    <input type="submit" id="Añadir" name="Añadir" value="<?=$titulo?>" style="width: 30%;"><br>
    <a href="?c=producto">Cancelar</a>
</center>
	</form>