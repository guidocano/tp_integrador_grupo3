
<head>
    <title>Admin ToDO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="styles.css" rel="stylesheet" type="text/css">
    
</head>
<body>


<div class="container">

<?php
session_start();
require_once 'connectDB.php';

$connect=conectar(); // implica un OPEN de la BD

if ($connect) {
    $id = $_SESSION['id'];
    print "<h1>TAREAS REALIZADAS<h1>";
// ejemplo 
$instruccion="SELECT * FROM tpasap.tareas WHERE realizado='1' AND idusuario='$id' ";
$consulta=mysqli_query($connect,$instruccion) or die ("Fallo en la consulta");
$filas=mysqli_num_rows($consulta);
    if ($filas == 0){
        print ("no hay tareas realizadas <br>");
    }else {       
        while ($fila=mysqli_fetch_array($consulta)){
            print "
                <tr>
               <td><br>".$fila['descripcion']."<br></td>
               </tr>  
";  
        }

    }
 desconectar($connect);
} else {
    print " No conecto ";
}
print "<a href='./index.php'>Volver a atras</a>";
?>


</div>
</body>