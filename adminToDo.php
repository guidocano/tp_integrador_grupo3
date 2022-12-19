<head>
    <title>Admin ToDO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
<div class="btnsAdminAgregar">
<div class="container containerAdmin">
<form action='insertToDo.php' method='POST'>
<span>Agregar Tarea</span>
<input type="text" name="descripcion" value='' class="textAgregar"><br>
<div class="btnsAdminAgregar">
<button type="submit" class="btn btn-primary" name="btnIngresar" value='Agregar'>Agregar</button>
<button type="reset" class="btn btn-primary">Borrar</button>   
</div>

</form>
</body>
<h3><a href='./index.php'>Volver atras</a></h3>

<?php
}


//BORRAR

if (!empty($_POST['aBorrar'])){
    foreach($_POST['aBorrar'] as $selected){
        $sql="DELETE FROM tareas where ID=".$selected;
        $resultado=mysqli_query($connect, $sql) or die(mysqli_error($connect));
        print " 

        <div class='container'>
        <h1> tarea fue Borrada <br></h1>
        
        <h3><a href='./index.php'>Volver atras</a></h3>
        </div>        
        ";

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
<div class="container" id="containerAdminModi">
    <div></div>
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
<h3><a href="./index.php">Volver atras</a></h3>
</div>
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
