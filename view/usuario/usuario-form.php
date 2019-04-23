
<label for="<?=$titulo?>"><?=$titulo?></label>
<form action="?c=usuario&a=Guardar" method="POST" class="form-horizontal">

    <input type="text" id="UsuId" name="UsuId" value="<?=$p->getUsu_id()?>" hidden="hidden">
    <center>
        <table>
            <tr>
                <td> Usuario:</td>
                <td><input type="text" id="Usuario" name="Usuario" required  value="<?=$p->getUsu_user()?>"></td>
                <td> Password:</td>
                <td> <input type="password" id="Pwd" name="Pwd"></td>
                <td> Nombre:</td>
                <td> <input type="text" id="Nombre" name="Nombre" required  value="<?=$p->getUsu_nom()?>"></td>
            </tr>
            <tr style="background-color: white;">
                <td> Email</td>
                <td><input type="text" id="Ema" name="Ema" required  value="<?=$p->getUsu_ema()?>"></td>
                <td> Fecha de nacimiento:</td>
                <td><input type="date" id="Fna" name="Fna" required  value="<?=$p->getUsu_fna()?>"></td>
                <td> Rol:</td>
                <td>
                    <select type="text" required="required" name="RolId">
                        <option value="">Seleccionar</option>
                        <?php foreach ($this->model->ObtenerRoles() as $dataRoles):
                            $seleccionar="";
                            if($dataRoles->rol_id==$p->getRol_id())$seleccionar="selected";
                            ?>
                            <option value="<?=$dataRoles->rol_id?>" <?=$seleccionar?>><?=$dataRoles->rol_nom?></option>
                        <?php endforeach;  ?>
                    </select>
                </td>
            </tr>
        </table>
        <br>
        <button type="submit" name="Registrar">Enviar</button>
    </center>
</form>
