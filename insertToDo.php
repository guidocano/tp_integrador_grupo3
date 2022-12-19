
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>To Do</title>
</head>
<body>



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
    print "
    <div class='container'>
    <h1> La tarea ".$descripcion." fue agregada </h1>
    
    
    <a href='./login.php'>Volver atras</a>
    </div>
    ";
    desconectar($connect);
} else {
    print "<h3>NO Conexion a la BD cursophp<h3>";
}
?>


</body>