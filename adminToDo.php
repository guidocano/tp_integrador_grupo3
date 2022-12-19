<head>
    <title>Admin ToDO</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
    
</head>
<body>
<?php
require 'connectDB.php';

$connect = conectar();
if  ($connect)
{    
?>



<?php
//AGREGAR   el de arriba tambien es un metodo agregar no etaria sabiendo cual de los

if (isset($_POST['agregar'])) 
{
?>


<form action='insertToDo.php' method='POST'>
<span>Agregar Tarea</span>
<input type="text" name="descripcion" value=''><br>
<input type=submit value='Agregar'>
</form>
</body>

<?php
}


//BORRAR

if (!empty($_POST['aBorrar'])){
    foreach($_POST['aBorrar'] as $selected){
        $sql="DELETE FROM tareas where ID=".$selected;
        $resultado=mysqli_query($connect, $sql) or die(mysqli_error($connect));
        print "tarea fue Borrada <br>";
        print "<a href='http://localhost/Curso/tp_integrador_grupo3-main/index.php'>Ir al inicio</a>";
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
<span>Realizado</span><br>
<input type="radio" name='realizado' value='1'>
<label>Realizada</label><br>
<input type="radio" name='realizado' value='0'>
<label>NO Realizada</label><br>
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
