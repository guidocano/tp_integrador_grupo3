<?php

require 'connectDB.php';

$connect = conectar();

if ($connect) {
    // me traigo los datos tipeados en el form
    // $id = $_POST['id'];
    $passOriginal=  $_POST['pass'];
    $pass = md5($passOriginal);
    $usuario = $_POST['usuario'];

    $sql = "SELECT id FROM tpasap.usuarios WHERE nombre ='".$usuario. "' AND password = '".$pass."'";
    $rta = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    $filas=mysqli_num_rows($rta);


    if ($filas == 0){
        print ("Datos de login equivocados <br>");
        print "El usuario '".$usuario . "' no está registrado con la contraseña ingresada.<br>";


    }else {
        print "Datos Autenticados! <br>";
        print "Bienvenido '".$usuario . "'!<br>";

        print "<br>Aqui irá el To Do List";

        // ESTO ES LO QUE LEVANTABA LA TABLA DE JUGADORES, PUEDE SERVIR DE MODELO

        // $instruccion2="Select * from jugador";
        // $consulta2=mysqli_query($connect,$instruccion2) or die ("Fallo en la consulta");
        // $filas2=mysqli_num_rows($consulta2);

        //         // print ("Datos Autenticados! Lista de jugadores: <br>");
        // print "<br>";
        // print "<table border=1>";
        // print "<tr><th>ID</th><th>Nombre</th><th>Edad</th><th>Camiseta</th><th>Club</th></tr>";
        // while ($fila=mysqli_fetch_array($consulta2)){
        //     print "<tr>
        //        <td>".$fila['idjugador']."</td>
        //        <td>".$fila['nombre']."</td>
        //        <td>".$fila['edad']."</td>
        //        <td>".$fila['camiseta']."</td>
        //        <td>".$fila['club']."</td>
        //        </tr>";
        // }

    }


    desconectar($connect);
} else {
    print "<h3>Hubo un problema</h3>";
}



?>