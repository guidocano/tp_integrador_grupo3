
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>To Do List</title>
</head>

<body>
    






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
    print "
    <div class='container'>

    <h1>La Tarea  $descripcion  fue modificada<br></h1>
    
    <h2><a href='./login.php'>Volver atras</a></h2>
    </div>
    ";

   
    desconectar($connect);
} else {
    print "<h3>NO Conexion a la BD cursophp<h3>";
}



?>
</body>