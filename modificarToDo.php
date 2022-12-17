<?php
require 'connectDB.php';

$connect = conectar();

if ($connect) {
    // me traigo los datos tipeados en el form por el empleado
    $ID=$_POST['idTareas'];
    $tareas= $_POST['tareasAgregar']; 


    $sql="UPDATE tareas set descripcion='".$ID."', descripcion=".$tareas.",where idTareas=".$ID;


    $rpta = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    print "tarea " . $ID . " fue modificado";
    desconectar($connect);
} else {
    print "<h3>NO Conexion a la BD cursophp<h3>";
}




?>