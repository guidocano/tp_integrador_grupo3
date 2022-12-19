<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>To Do</title>
</head>
<body>
    <h1 class="logInIndex">Log-In</h1>
    <form class ="formulario" method="post" action="login.php">
        <div class="container" id="container2">
            <div class="visual">
                <div class="encudre">
                <div class="mb-5">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input name="usuario" type="text" id="usuario"  class="form-control" aria-describedby="textHelp">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" class="form-control"  id="pass" name="pass">
                </div>
                <div>
                </div>
                <div class="btnsIndex">
                <button type="submit" class="btn btn-primary" name="btnIngresar">Ingresar</button>
                <button type="reset" class="btn btn-primary">Borrar</button>         
                </div>
                <div class="indexRegistro">
                <p>Para registrarte presiona</p><a href="./Registrar.php">Registrar</a>
                </div>        
            </div>
        </div>
    </div>
    <?php
?>
</form>













</body>

</html>


