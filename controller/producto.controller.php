<?php
require_once "model/producto.php";
require_once "model/marca.php";//Modelo Marca

class ProductoController{
    private $model;

    public function __CONSTRUCT(){
       $this->model=new Producto();
    }


    public function Index(){
        require_once "view/header.php";
        require_once "view/producto/index.php";
        require_once "view/footer.php";
    }
    public function Crear(){

        if(isset($_GET['id'])){
            $titulo = "Modificar";
            $p=$this->model->Obtener($_GET['id']);
        }else{
            $p=new Producto();
            $titulo="Añadir Producto";
        }
        $m=new Marca();
        require_once "view/header.php";
        require_once "view/producto/producto-form.php";
        require_once "view/footer.php";
    }
    public function Guardar(){


        $producto=new Producto();

        $producto->setPro_id(intval($_POST["ID"]));
        $producto->setPro_nom($_POST['Nombre']);
        $producto->setPro_cos($_POST['Costo']);
        $producto->setPro_desc($_POST['Descripcion']);

        
        $producto->getPro_id() > 0 ?
        $this->model->Actualizar($producto) : //if
        $this->model->Insertar($producto);

        header("location: ?c=producto");
    }
    //ASOCIAR PRODUCTO A PERSONA
    public function Asociar(){

    }

    public function Eliminar(){
        if(isset($_GET['id'])){
            $this->model->Eliminar($_GET['id']);
            header("location: ?c=producto");
        }
    }
}