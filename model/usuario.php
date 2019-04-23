<?php
    class Usuario{

    private $pdo;

    public $usu_id; 
    public $usu_user;
    public $usu_pwd;
    public $usu_nom;
    public $usu_ema;
    public $usu_fna;
    public $usu_rol;
    private $rol_id;
    private $rol_nom;



    public function __CONSTRUCT(){
        $this->pdo= Database::Conectar();


    }

    function setRol_id(int $Id){
        $this->rol_id=$Id;
    }

    function getRol_id():?int{
        return $this->rol_id;

    }
     public function setUsu_id(int $id){
        $this->usu_id=$id;
    }
     public function getUsu_id() :?int{
        return $this->usu_id;
    }

    public function setUsu_user(string $user){
        $this->usu_user=$user;
    }

     public function getUsu_user() :?string{
        return $this->usu_user;
    }

    public function setUsu_pwd(string $pwd){
        $this->usu_pwd=$pwd;
    }

     public function getUsu_pwd() :?string{
        return $this->usu_pwd;
    }

    public function setUsu_nom(string $nom){
        $this->usu_nom=$nom;
    }

     public function getUsu_nom() :?string{
        return $this->usu_nom;
    }

    public function setUsu_ema(string $ema){
        $this->usu_ema=$ema;
    }

    public function getUsu_ema() :?string{
        return $this->usu_ema;
    }

    public function setusu_fna(string $fna){
        $this->usu_fna=$fna;
    }

     public function getUsu_fna() :?string{
        return $this->usu_fna;
    }

    public function setUsu_rol(int $rol){
        $this->usu_rol=$rol;
    }

     public function getUsu_rol() :?int{
        return $this->usu_rol;
    }
    public function setRol_nom(string $rol){
        $this->rol_nom=$rol;
    }

     public function getRol_nom() :?string{
        return $this->rol_nom;
    }


    public function Listar(){
        try{
        $consulta="SELECT *  FROM usuarios join roles on roles.rol_id=usuarios.usu_rol";
        $sentencia=$this->pdo->prepare($consulta);
        $sentencia->execute();
        
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        }catch(Exception $e){
            die($e->getMessager());
        }
    }
     public function Obtener($id){
        try{
        $consulta="SELECT * FROM usuarios join roles on roles.rol_id=usuarios.usu_rol WHERE usu_id=?";
        $sentencia=$this->pdo->prepare($consulta);
        $sentencia->execute(array($id));
        
        $r=$sentencia->fetch(PDO::FETCH_OBJ);
        $p= new Usuario();
        $p->setUsu_id($r->usu_id);
        $p->setUsu_user($r->usu_user);
        $p->setUsu_pwd($r->usu_pwd);
        $p->setUsu_nom($r->usu_nom);
        $p->setUsu_ema($r->usu_ema);
        $p->setUsu_fna($r->usu_fna);
        $p->setUsu_rol($r->usu_rol);
        $p->setRol_id($r->rol_id);
        $p->setRol_nom($r->rol_nom);
        return $p;
        }catch(Exception $e){
            die($e->getMessager());
        }
    }

    //OBTENER ROLES
     public function ObtenerRoles(){
        try{
        $consulta="SELECT * FROM roles";
        $sentencia=$this->pdo->prepare($consulta);
        $sentencia->execute();

        return $sentencia->fetchAll(PDO::FETCH_OBJ);

        }catch(Exception $e){
            die($e->getMessager());
        }
    }

    public function Insertar(Usuario $u){
        try{


            $consulta="INSERT INTO usuarios (usu_user, usu_pwd, usu_nom, usu_ema, usu_fna, usu_rol) values (?,?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                    ->execute(
                        array(
                            $u->getUsu_user(),
                            $u->getUsu_pwd(),
                            $u->getUsu_nom(),
                            $u->getUsu_ema(),
                            $u->getUsu_fna(),
                            $u->getRol_id()
                        )
                    );
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function Actualizar(Usuario $p){
        try{
           $password=md5(sha1($p->getUsu_pwd()));

            $consulta="UPDATE usuarios SET
                        usu_user = ?,
                        usu_pwd = ?,
                        usu_nom = ?,
                        usu_ema = ?,
                        usu_fna = ?,
                        usu_rol = ?

                        WHERE usu_id = ?;";

            $this->pdo->prepare($consulta)
                    ->execute(
                        array(
                            $p->getUsu_user(),
                            $password,
                            $p->getUsu_nom(),
                            $p->getUsu_ema(),
                            $p->getUsu_fna(),
                            $p->getRol_id(),
                            $p->getUsu_id()
                        )
                    );
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

     public function Eliminar($id){
        try{
            $consulta="DELETE FROM usuarios WHERE usu_id= ?;";
            $this->pdo->prepare($consulta)
                    ->execute(
                        array(
                            $id
                        )
                    );
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    // validacion de usuario y contraseña

    public function Validar($user,$pwd){
        try{
            //Valida con Formato Md5
            $pwd=md5(sha1($pwd));

            $consulta=$this->pdo->prepare("SELECT * from usuarios where usu_user=? and usu_pwd=?;");
            $consulta->execute(array($user,$pwd));

            $u=$consulta->fetch(PDO::FETCH_OBJ);

            if(!empty($u)){
                $_SESSION['user']=$u->usu_user;
                $_SESSION['rol']=$u->usu_rol;
                return true;

            }else{
                session_destroy();
                return false;
            }


        }catch(Exception $e){
            die($e->getMessage());

        }
    }
}

?>