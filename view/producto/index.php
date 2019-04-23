<h2>Inventario</h2>
<table style="width: 80%;">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Costo</td>
            <td>Descripcion</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r):?>
        <tr>
            <td><?=$r->pro_id?></td>
            <td><?=$r->name?></td>
            <td>$ <?=number_format($r->value,0,",",".")?></td>
            <td><?=utf8_encode($r->description)?></td>
            <td></td>
        <?php if($_SESSION['rol']==1): ?>
            <td><a href="?c=producto&a=Crear&id=<?=$r->pro_id?>">Editar</a></td>
            <td><a href="?c=producto&a=Eliminar&id=<?=$r->pro_id?>">Eliminar</a></td>
            <td><a href="?c=producto&a=Asociar&id=<?=$r->pro_id?>">Asociar</a></td>
        </tr>
        <?php endif;?>


    <?php endforeach;?>
        </tbody>
</table>
<a href="?c=producto&a=Crear" class="btn btn-primary">Añadir Producto</a>
        
    

