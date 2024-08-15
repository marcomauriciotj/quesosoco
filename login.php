<?php
session_start();
require_once "modelo/conexion.php";

if (!empty($_POST["username"]) and !empty($_POST["password"])) {
       
        $username=$_POST["username"];
        $password=$_POST["password"];
        $sql=$conexion->query("select * from login where usuario='$username' and contraseña='$password' ");
        //print_r($sql);
        //echo "<br>";
        if ($sql->num_rows>0) {
            $datos = $sql->fetch_object();
            //print_r($datos);
            $_SESSION["id_login"]= $datos->id_login;
            $_SESSION["username"]=$datos->usuario;
            //echo $_SESSION["id_login"];
            header('location:modulos/administrador/indexadmin.php');
        } else {
            header('location:login.html');
        }   

    }else {
        header('location:login.html');
}

?>