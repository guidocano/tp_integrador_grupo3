<?php
require 'connectDB.php';

$connect = conectar();

if ($connect) {
    // me traigo los datos tipeados en el form por el empleado
    $tareas = $_POST['descripcion'];
    $realizado = $realizado['realizado'];

    $sql = "insert into tareas (descripcion, realizado) values ('".$tareas.", ".$realizado.")";

    $rpta = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    print "La tarea ".$tareas." fue agregado";
    desconectar($connect);
} else {
    print "<h3>NO Conexion a la BD cursophp<h3>";
}
?>
