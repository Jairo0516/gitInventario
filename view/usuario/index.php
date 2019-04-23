
<h2>Usuarios</h2>
<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>Usuario</td>
            <td>Nombre</td>
            <td>Correo</td>
            <td>Fecha De Nacimiento</td>
            <td>Rol</td>
            <td></td>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r):?>
        <tr>
            <td><?=$r->usu_id?></td>
            <td><?=$r->usu_user?></td>
            <td><?=$r->usu_nom?></td>
            <td><?=$r->usu_ema?></td>
            <td><?=$r->usu_fna?></td>
            <td><?=$r->rol_nom?></td>
            <td><a href="?c=usuario&a=Crear&id=<?=$r->usu_id?>">Editar</a></td>
            <td><button onclick="validationDelete('?c=usuario&a=Eliminar&id=<?=$r->usu_id?>',' el usuario <?=$r->usu_nom?>')">Eliminar</button></td>

        </tr>
    <?php endforeach;?>
    </tbody>
</table>

<a href="?c=usuario&a=Crear">Registrar Usuario</a>
