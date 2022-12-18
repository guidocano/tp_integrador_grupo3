<?php
require 'connectDB.php';

$connect = conectar();

if ($connect) {
    // me traigo los datos tipeados en el form por el empleado
    $ID=$_POST['ID'];
    $descripcion= $_POST['descripcion'];
    $realizado = $_POST['realizado'];
    $sql="UPDATE tpasap.tareas set ID='".$ID."', descripcion='".$descripcion."', realizado='".$realizado."' where ID=".$ID;

    $rpta = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    print "La Tarea  $ID  fue modificada";
    desconectar($connect);
} else {
    print "<h3>NO Conexion a la BD cursophp<h3>";
}


?>
