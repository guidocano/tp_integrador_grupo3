<?php

function conectar(){
    // usuario MAESTRO que se conecta con la BD
    $usuario = "root";
    $pass= "";
    $bd = "usuarios";
    $servidor = "localhost";

    $connect = mysqli_connect($servidor, $usuario, $pass, $bd);
    return $connect;
}

function desconectar($connect){
    mysqli_close($connect);
}

?>