<?php 
class Marca{
    private $pdo;

    private $mar_id;
    private $mar_nom;
    private $mar_dtl;
    public function __CONSTRUCT(){
         $this->pdo= Database::Conectar();
    }

    
    /*public function __CONSTRUCT(int $a,string $b,string $d){
        $this->mar_id=$a;
        $this->mar_nom=$b;
        $this->mar_dtl=$d;

        $this->pdo= Database::Conectar();
    }*/



    function setMar_id(int $ID){
        $this->mar_id=$ID;
    }
        function getMar_id():?int{
        return $this->mar_id;

    }
    function setMar_nom(string $mar_nom){
        $this->mar_nom=$mar_nom;
    }
    function getMar_nom():?string{
        return $this->mar_nom;
    }

     function setMar_dtl(string $mar_dtl){
        $this->mar_dtl=$mar_dtl;
    }
    function getMar_dtl():?string{
        return $this->mar_dtl;
    }

    public function Listar(){
        try{
            $consulta="SELECT * FROM marcas";
            $sentencia=$this->pdo->prepare($consulta);
            $sentencia->execute();

            return $sentencia->fetchAll(PDO::FETCH_OBJ);

        }catch(Exception $e){
            die($e->getMessager());
        }

    }

    public function Obtener($id){
        try{
         $consulta="SELECT * FROM marcas WHERE mar_id=?";
        $sentencia=$this->pdo->prepare($consulta);
        $sentencia->execute(array($id));
        
        $r = $sentencia->fetch(PDO::FETCH_OBJ);
        $m = new Marca();
        $m->setMar_id($r->mar_id);
        $m->setMar_nom($r->mar_nom);
        $m->setMar_dtl($r->mar_dtl);
        
        return $m;
        
        }catch(Exception $e){
            die($e->getMessager());
        }
    }
   
    public function Insertar(Marca $m){
        try{
            $consulta="INSERT INTO marcas (mar_nom, mar_dtl) values (?,?);";
            $this->pdo->prepare($consulta)
            ->execute(
                  array(
                    $m->getNombre,
                    $m->getdtl
                    
                 
                    )

                );

        }catch(Exception $e){
            die($e->getMessage());
        }

    }

    public function Actualizar(Marca $m){
        try{
            $consulta="UPDATE marcas  set 
                  mar_nom= ?,
                  mar_dtl =?
                  
                  WHERE mar_id = ?;
            ";
            $this->pdo->prepare($consulta)
            ->execute(
                  array(
                    $m->mar_nom,
                    $m->mar_dtl,
                    $m->mar_id
                 
                    )

                );

        }catch(Exception $e){
            die($e->getMessage());
        }

    }

public function Eliminar($id){
        try{
            $consulta="DELETE FROM marcas WHERE mar_id=?";
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