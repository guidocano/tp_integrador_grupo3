<?php

require 'connectDB.php';

$connect = conectar();

if ($connect) {

    $passOriginal=  $_POST['pass'];
    $pass = md5($passOriginal);
    $usuario = $_POST['usuario'];

    $sql = "SELECT id FROM tpasap.usuarios WHERE nombre ='".$usuario. "' AND password = '".$pass."'";
    $rta = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    $filas=mysqli_num_rows($rta);


    if ($filas == 0){
        print ("Datos de login equivocados <br>");
        print "El usuario '".$usuario . "' no está registrado con la contraseña ingresada.<br>";

    } else {
        // print "Datos Autenticados! <br>";
        // print "Bienvenido '".$usuario . "'!<br>";
        header("Location: homeToDo.php");

    }


    desconectar($connect);
} else {
    print "<h3>Hubo un problema</h3>";
}



?>