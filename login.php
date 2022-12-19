<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>To Do List</title>
</head>

<?php

require 'connectDB.php';

$connect = conectar();
session_start();
if ($connect) {

    $passOriginal=  $_POST['pass'];
    $pass = md5($passOriginal);
    $usuario = $_POST['usuario'];
    $sql = "SELECT id FROM tpasap.usuarios WHERE nombre ='".$usuario. "' AND password = '".$pass."'";
    $rta = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    $filas=mysqli_num_rows($rta);
    $logeado = $rta->fetch_object();
  


    // si NO encuentra el id de usuario
    if ($filas == 0){
        print ("Datos de login equivocados <br>");
        print "El usuario '".$usuario . "' no está registrado con la contraseña ingresada.<br>";

    // si SI encuentra el id de usuario se loguea y muestra la tabla
    } else {
        
        //trae las tareas de la base de datos
        //No realizados
        $id = $_SESSION['id'] = $logeado->id;
        $instruccion="SELECT * from tpasap.tareas WHERE idusuario='$id' AND realizado='0'";
        $consulta=mysqli_query($connect,$instruccion) or die ("Fallo en la consulta");
        $filas=mysqli_num_rows($consulta);
        //Realizados y no realizados
        $instrucciontodos="SELECT * from tpasap.tareas WHERE idusuario='$id'";
        $consultatodos=mysqli_query($connect,$instrucciontodos) or die ("Fallo en la consulta");
        $filastodos=mysqli_num_rows($consultatodos);
        //trae la cantidad de incompletos por id
        $cantidadincompletos = "SELECT realizado from tpasap.tareas WHERE realizado='0' AND idusuario='$id'";
        $consultainc = mysqli_query($connect, $cantidadincompletos);
        $filasincompletos=mysqli_num_rows($consultainc);

        if ($filas == 0){
            $usuarioMayus = ucfirst($usuario); 
        
    
            // muestra el body y la tabla con la info de la base de datos
            print "<body>";
            print "<div class='container'>";

           
            // muestra el nombre del usuario en el titulo de la tabla
            print "<div class='toDosName color-primary'>";
            print "<h1> Bienvenido ".$usuarioMayus . " esta es tu lista de tareas</h1>";
            print "<h2>".$filasincompletos ."items incompletos</h2>";
            print "</div>";
    
            // BOTONES AGREGAR EDITAR BORRAR
            print "<form class='row g-3' action='adminToDo.php' method='POST'>";    
            print "<div class='mb-3'>";

            print "<div class='col-auto'>";
            print "<button type='submit' class='btn btn-primary mb-3' value='Agregar' name='agregar'>Agregar</button>";
            print "</div>";
         
            print "</div>";
    
            //ENCABEZADOS TABLA
            print "<table class='table caption-top'>";
            print "<thead>";
            print "<tr>";
            print "<th scope='col'>#</th>";
            print "<th scope='col'>Descripcion</th>";
            print "<th scope='col'>Realizado</th>";
            print "<th scope='col'>Editar</th>";
            print "<th scope='col'>Borrar</th>";
            print "</tr>";

        } else {
            // le dice al usuario que se logueo correctamente
            $usuarioMayus = ucfirst($usuario); 
    
    
            // muestra el body y la tabla con la info de la base de datos
            print "<body>";
            print "<div class='container'>";
    
            // muestra el nombre del usuario en el titulo de la tabla
            print "<div class='toDosName color-primary'>";
            print "<h1> Bienvenido ".$usuarioMayus . " esta es tu lista de tareas</h1>";
            print "<h2>".$filasincompletos." items incompletos</h2>";
            print "</div>";
    
            // BOTONES AGREGAR EDITAR BORRAR
            print "<form class='row g-3' action='adminToDo.php' method='POST'>";    
            print "<div class='mb-3'>";

            print "<div class='col-auto'>";
            print "<button type='submit' class='btn btn-primary mb-3' value='Agregar' name='agregar'>Agregar</button>";
            print "</div>";
            print "<div class='col-auto'>";
            print "<button type='submit' class='btn btn-info mb-3' value='Modificar'>Editar</button>";
            print "</div>";
            print "<div class='col-auto'>";
            print "<button type='submit' class='btn btn-danger mb-3' value='Borrar'>Borrar</button>";
            print "</div>";
            print "</div>";
    
            //ENCABEZADOS TABLA
            print "<table class='table caption-top'>";
            print "<thead>";
            print "<tr>";
            print "<th scope='col'>#</th>";
            print "<th scope='col'>Descripcion</th>";
            print "<th scope='col'>Realizado</th>";
            print "<th scope='col'>Editar</th>";
            print "<th scope='col'>Borrar</th>";
            print "</tr>";


            // carga cada Tarea en una fila. 

    while ($fila = mysqli_fetch_array($consulta)) {
        print "<tr>
        <td>".$fila['ID']."</td>
        <td>".$fila['descripcion']."</td>
        <td>".$fila['realizado']."</td>                
        <td><input type='checkbox' name='aEditar[]' value=".$fila['ID'] . "></td>
        <td><input type='checkbox' name='aBorrar[]' value=".$fila['ID'] . "></td>
        </tr>";
    
}

}
        print "</table>";
        print "</form>";
        print "<form action='enviarCheckbox.php' method='get'>";
        print "<div class='tareasRealizadas'>";
        print "<input onChange='submit' class='form-check-input' type='checkbox' value='1' id='flexCheckDefault1' name ='option1'>";
        print "<input onChange='submit()' class='form-check-input' type='checkbox' value='0' id='flexCheckDefault'>";
        print "<label class='form-check-label' for='flexCheckDefault'> Mostrar tareas realizadas</label>";            
        print "</td>";   
        print "</div>";
        print "</div>";
        print "</form>";
        print "</body>";       
    }

    desconectar($connect);
} else {
    print "<h3>Hubo un problema</h3>";
}

if(isset($_GET['submit'])) {
    $var = $_GET['option1'];
    if(isset($var)) {
        echo "Option 1 submitted successfully";
    }
}


?>
