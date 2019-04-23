<?php
require_once "model/usuario.php";


class UsuarioController{
    private $model;

    public function __CONSTRUCT(){

       if(isset($_SESSION['rol']) && $_SESSION['rol']==2){

            if($_GET['a']!="Cerrar"){
                header("Location:index.php");
                exit;
            }
        }
        $this->model=new Usuario();
    }

    public function Index(){
        require_once "view/header.php";
        require_once "view/usuario/index.php";
        require_once "view/footer.php";
    }
      public function Login(){
        require_once "view/usuario/login.php";
        
    }

public function Iniciar(){

    $user=$this->model->Validar($_POST['user'], $_POST['password']);
    
        if($user){
            header("location:index.php");

        }else{
            header("location:index.php?error");
        }
} 

    public function Cerrar(){
        session_destroy();
        header("location:index.php");
    }

    public function Crear(){

        if(isset($_GET['id'])){
            $titulo = "Modificar Usuario";
            $p=$this->model->Obtener($_GET['id']);
        }else{
            $p=new Usuario();
            $titulo="Añadir usuario";

        }
        $u=new usuario();
        require_once "view/header.php";
        require_once "view/usuario/usuario-form.php";
        require_once "view/footer.php";
    }
    public function Guardar(){
        $usuario=new Usuario();

       
        $usuario->setUsu_user($_POST['Usuario']);
        //Md5 es la encriptacion al Registrar un usuario
        $usuario->setUsu_pwd(md5(sha1($_POST['Pwd'])));
        $usuario->setUsu_nom($_POST['Nombre']);
        $usuario->setUsu_ema($_POST['Ema']);
        $usuario->setUsu_fna($_POST['Fna']);
        $usuario->setRol_id($_POST['RolId']);


        if($_POST['UsuId'] > 0) {
            $usuario->setUsu_id($_POST['UsuId']);
            $this->model->Actualizar($usuario);
        }else{$this->model->Insertar($usuario);}

        header("location: ?c=usuario");
    }

    public function Eliminar(){
        if(isset($_GET['id'])){
            $this->model->Eliminar($_GET['id']);
            header("location: ?c=usuario");
        }
    }
}