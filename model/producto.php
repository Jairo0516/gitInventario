<?php
class Producto{
    private $pdo;

    private $pro_id; 
    private $name;
    private $value;
    private $description;



    public function __CONSTRUCT(){
        $this->pdo= Database::Conectar();
    }

 
     function setRol_nom(string $rolnom){
        $this->rol_nom=$rolnom;
    }

        function setPro_id(int $Id){
        $this->pro_id=$Id;
    }
        function getPro_id():?int{
        return $this->pro_id;

    }

        function setPro_nom(string $nom){
        $this->name=$nom;
    }
        function getPro_nom():?string{
        return $this->name;

    }

    function setPro_cos(float $cos){
        $this->value=$cos;
    }
        function getPro_cos():?float{
        return $this->value;

    }

    function setPro_desc(string $desc){
        $this->description=$desc;
    }
     function getPro_desc():?string{
        return $this->description;

    }

    public function Listar(){
        try{
        $consulta="SELECT pro_id,name,value,description FROM goods ";
        $sentencia=$this->pdo->prepare($consulta);
        $sentencia->execute();
        
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        }catch(Exception $e){
            die($e->getMessager());
        }
    }

    public function Obtener($id){
        try{
        $consulta="SELECT * FROM goods WHERE pro_id=?";
        $sentencia=$this->pdo->prepare($consulta);
        $sentencia->execute(array($id));
        
        $r = $sentencia->fetch(PDO::FETCH_OBJ);
        $p = new Producto();
        $p->setPro_id($r->pro_id);
        $p->setPro_nom($r->name);
        $p->setPro_cos($r->value);
        $p->setPro_desc($r->description);

        return $p;
        
        }catch(Exception $e){
            die($e->getMessager());
        }
    }

    public function Insertar(Producto $p){
        try{
            $consulta="INSERT INTO goods (name,value, description) values (?,?,?);";
            $this->pdo->prepare($consulta)
                    ->execute(
                        array(
                            $p->getPro_nom(),
                            $p->getPro_cos(),
                            $p->getPro_desc()
                        )
                    );
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Producto $p){
        try{
            $consulta="UPDATE goods SET
                        name = ?,
                        value = ?,
                        description = ?
                    
                        WHERE pro_id = ?;";
            $this->pdo->prepare($consulta)
                    ->execute(
                        array(
                            $p->getPro_nom(),
                            $p->getPro_cos(),
                            $p->getPro_desc(),
                            $p->getPro_id()
                        )
                    );
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Eliminar($id){
        try{
            $consulta="DELETE FROM good WHERE pro_id= ?;";
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

}