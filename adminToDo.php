<head>
    <title>Admin ToDO</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
require 'connectDB.php';

$connect = conectar();
if  ($connect)
{    
?>


<form action='insertToDo.php' method='POST'>
<span>Texto a agregar</span>
<input type="text" name="descripcion" value=''><br>
<span>realizado</span>
<input type=text name='realizado' value=''><br>
<input type=submit value='Agregar'>
</form>
</body>
<?php
    //AGREGAR   el de arriba tambien es un metodo agregar no etaria sabiendo cual de los


if (isset($_POST['agregar'])) 
{
?>
<form action='insertToDo.php' method='POST'>
<span>Texto a agregar</span>
<input type="text" name="descripcion" value=''><br>
<span>realizado</span>
<input type="text" name="descripcion" value=''><br>
<input type=submit value='Agregar'>
</form>
</body>
<?php
}


//BORRAR
if (!empty($_POST['aBorrar'])){
    foreach($_POST['aBorrar'] as $selected){
        $sql="delete from tareas where ID=".$selected;
        $resultado=mysqli_query($connect, $sql) or die(mysqli_error($connect));
        print "tarea ID ".$selected." Borrado";
    }

  }


  //MODIFICAR
if (!empty($_POST['aEditar']))
{    foreach($_POST['aEditar'] as $selected){
        $sql="select * from tareas where ID=".$selected;
        $resultado=mysqli_query($connect, $sql) or die(mysqli_error($connect));
        $filas=mysqli_num_rows($resultado);
        if ($filas == 0)
        {
            print ("no hay tareas para editar <br>");
        }
        else
        {
            while($fila=mysqli_fetch_array($resultado)){
?>

<form action="modificarToDo.php" method="POST">
<span>ID</span>
<input type=text name='ID' value='<?php print $fila['ID']?>'><br>
<span>Descripcion</span>
<input type=text name='descripcion' value='<?php print $fila['descripcion']?>'><br>
<input type=submit value='Modificar'>
</form>

<?php
            }
        }
    }
}
    desconectar($connect);
} 

else 

{
    print "<h3>NO Conexion a la BD cursophp<h3>";
}
?>