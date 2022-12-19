<?php
session_start();
require 'connectDB.php';

$connect = conectar();

if ($connect) {

    // me traigo los datos tipeados en el form por el empleado
    $descripcion = $_POST['descripcion'];
    $id = $_SESSION['id'];
    
  
    
    // $realizado = $realizado['realizado'];
    $sql = "insert into tpasap.tareas (descripcion, realizado,idusuario) values ('".$descripcion."',0,'".$id."')";
    $rpta = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    print "La tarea ".$descripcion." fue agregada";
    desconectar($connect);
} else {
    print "<h3>NO Conexion a la BD cursophp<h3>";
}
?>
