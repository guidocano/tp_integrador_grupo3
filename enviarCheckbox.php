<?php
require_once 'connectDB.php';

$connect=conectar(); // implica un OPEN de la BD

if ($connect) {
    print "<h1>TAREAS REALIZADAS<h1>";
// ejemplo 
$instruccion="Select * from tareas where realizado > 0";
$consulta=mysqli_query($connect,$instruccion) or die ("Fallo en la consulta");
$filas=mysqli_num_rows($consulta);










    if ($filas == 1){
        print ("no hay tareas a realizar <br>");
    }else {       
        while ($fila=mysqli_fetch_array($consulta)){
            print "<tr>
               <td><br>".$fila['descripcion']."<br></td>
               </tr>";
        }
        print "</table>";
    }
 desconectar($connect);
} else {
    print " No conecto ";
}


print "<br> <a href='./index.php'>Volver a atras</a> <br>";
?>



