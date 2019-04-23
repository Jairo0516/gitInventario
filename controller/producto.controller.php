<?php
require_once "model/producto.php";
require_once "model/usuario.php";//Modelo Uusrio

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
        $resultado=$this->model->Actualizar($producto) : $resultado=$this->model->Insertar($producto);

        if(empty($resultado)){$resultado="success";}else{$resultado="error";}

        header("location: ?c=producto&alert=".$resultado);
    }
    public function Eliminar(){
        if(isset($_GET['id'])){
            $resultado=$this->model->Eliminar($_GET['id']);
            if(empty($resultado)){$resultado="success";}else{$resultado="error";}


            header("location: ?c=producto&alert=".$resultado);
        }
    }

    //ASOCIAR PRODUCTO A PERSONA VIEW
    public function Asociar(){

         $titulo = "Asociar";
         $p=$this->model->Obtener($_GET['idProducto']);

        $usuario =new Usuario();

        require_once "view/header.php";
        require_once "view/producto/asociar.php";
        require_once "view/footer.php";
    }//ASOCIAR PRODUCTO A PERSONA GUARDA
    public function asociarGuarda(){

        $producto=new Producto();


        $producto->setPro_id(intval($_POST["ID"]));
        $producto->setUserIdName($_POST["userId"]);

        //RESULTADO PARA MOSTRAR ALERT
        $resultado=$this->model->InsertarAsocia($producto);
        if(empty($resultado)){$resultado="success";}else{$resultado="error";}


        header("location: ?c=producto&alert=".$resultado);
    }
}