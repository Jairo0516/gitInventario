<?php

class Database{
    const server = "localhost";
    const dbuser = "root";
    const dbpass = "";
    const dbname = "inventario";


    public static function Conectar(){
        try{
            $conexion = new PDO('mysql:host='.self::server.';dbname='.self::dbname,self::dbuser,self::dbpass);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conexion;
        }catch(PDOException $e){
            return "Error: ".$e->getMessage();
        }
        
    }
}