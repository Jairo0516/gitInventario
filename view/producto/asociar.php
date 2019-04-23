
<h1><?=$titulo?></h1>
<form action="?c=producto&a=asociarGuarda" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="ID"  value="<?=$p->getPro_id()?>">
    <center>

        <table style="width: 50%;">
            <tr>
                <td colspan="4">
                   <center>Usuario A Asociar</center>
                    <select name="userId" id="userId" required>
                        <option value="">Seleccionar</option>
                        <?php foreach ($usuario->Listar() as $dataUser):?>
                            <option value="<?=$dataUser->usu_id?>"><?=$dataUser->usu_nom?></option>
                        <?php endforeach;?>

                    </select></td>
            </tr>
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


        <input type="submit" id="Asociar" name="Asociar" value="<?=$titulo?>" style="width: 30%;"><br>
        <a href="?c=producto">Cancelar</a>
    </center>
</form>


<section style="margin-top: 30px;">
    <h1>Usuarios relacionados con este producto</h1>
    <table>
        <thead>
        <tr>
            <td>Nombre Usuario</td>
            <td>Email Usuario</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($this->model->ObtenerAsociacion($p->getPro_id()) as $dataAsociacion): ?>
            <tr>
                <td><?=$dataAsociacion->usu_nom?></td>
                <td><?=$dataAsociacion->usu_ema?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
