<?php
require 'connectDB.php';

$connect = conectar();

if ($connect) {
    // me traigo los datos tipeados en el form por el empleado
    $descripcion = $_POST['descripcion'];
    // $realizado = $realizado['realizado'];

    $sql = "insert into tareas (descripcion, realizado) values ('".$descripcion."', 0)";

    $rpta = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    print "La tarea ".$descripcion." fue agregado";
    desconectar($connect);
} else {
    print "<h3>NO Conexion a la BD cursophp<h3>";
}
?>
