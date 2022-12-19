<?php

require 'connectDB.php';
$connect = conectar();

if($connect){
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $pass = md5($password);
    
    $sql = "insert into tpasap.usuarios (nombre,password) values ('" . $nombre . "','" . $pass . "')";
    $rpta = mysqli_query($connect, $sql) or die(mysqli_error($connect));
if(isset($_POST['agregar'])){
    print"<form action='insertJugador.php' method='POST'>";
print "<span>Nombre</span>";
print "<input type='text' name='nombre' value=''><br>";
        print "<span>Password</span>";
print "<input type='text' name='password' value=''><br>";
}

    print "Fuiste Agregado " . $nombre."<br>";
    print "<a href='./index.php'>Ir al inicio</a>";
    desconectar($connect);
}else{
    print "<h3>NO Conexion a la BD cursophp<h3>";
}

?>