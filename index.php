<?php

require "model/database.php";

session_start();// Inicio de sesion
//verificamos que exista la variable de sesion "user"
if(isset($_SESSION['user']) || (isset($_POST['user']) && isset($_POST['password']))) {


//Frontend Controller
    if(!isset($_GET['c'])) {
        require_once "controller/home.controller.php";
        $controller = new HomeController();
        $accion= "Index";
        call_user_func(array ($controller, $accion));
    }else{
        $controller = $_GET['c'];
        $accion = isset($_GET['a']) ? $_GET['a'] : "Index";

        //Instanciar el Controlador
        require_once "controller/$controller.controller.php";
        //ucwords UpperCaseWords Mayuscula al inicio
        $clase = ucwords($controller)."Controller";
        $controller = new $clase;
        //Llamar metodo de un objeto instanciado
        call_user_func(array ($controller, $accion));
    }


}else{//cargar login
        require_once "controller/usuario.controller.php";
        $controller = new UsuarioController();
        call_user_func(array ($controller, "Login"));
}



