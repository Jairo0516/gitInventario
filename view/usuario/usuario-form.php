
<label for="<?=$titulo?>"><?=$titulo?></label>
<form action="?c=usuario&a=Guardar" method="POST" class="form-horizontal">
    <br><input type="text" id="UsuId" name="UsuId" value="<?=$p->getUsu_id()?>" hidden="hidden">
    Usuario:
    <input type="text" id="Usuario" name="Usuario" required  value="<?=$p->getUsu_user()?>">
    Password:
    <input type="text" id="Pwd" name="Pwd">
    Nombre:
    <input type="text" id="Nombre" name="Nombre" required  value="<?=$p->getUsu_nom()?>">
    Email
    <input type="text" id="Ema" name="Ema" required  value="<?=$p->getUsu_ema()?>">
    Fecha de nacimiento:
    <input type="date" id="Fna" name="Fna" required  value="<?=$p->getUsu_fna()?>">
    Rol:
    <select type="text" required="required" name="RolId">
        <option value="">Seleccionar</option>
            <?php foreach ($this->model->ObtenerRoles() as $dataRoles):
                $seleccionar="";
                if($dataRoles->rol_id==$p->getRol_id())$seleccionar="selected";
                ?>
                <option value="<?=$dataRoles->rol_id?>" <?=$seleccionar?>><?=$dataRoles->rol_nom?></option>
            <?php endforeach;  ?>
    </select>
   
    <input type="submit" name="Registrar">
</form>
