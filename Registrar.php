<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=    
    , initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container" id="containerRegistro">
    <form action="./RegistroToDo.php" method="post">
        <label for="nombre">Usuario</label><br>
        <input type="text" id="nombre" name="nombre"/><br>   
                                
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password"/><br>
        <div class="btnRegistro">
        <button class="btn btn-primary" type="submit">Enter</button>
        
        <a href="./index.php"> Vuelva a la pagina anterior</a>
        </div>



</form>

</div>
</body>
</html>