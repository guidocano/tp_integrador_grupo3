<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDOs List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="container">

    <div class="toDosName color-primary" >
        <h1>Nombre Lista de ToDos</h1>
        <h2>blbalba  items incompletos</h2>
    </div>    


    <form class="row g-3">        
        <div class="mb-3">
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tipee una tarea aqui">
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Agregar</button>
              </div>
        </div>
    </form>


    <table class="table caption-top">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Realizado</th>
            <th scope="col">#</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">         
                </label></td>
            </tr>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td> <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">         
                </label></td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td> <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">         
                </label></td>
          </tr>

        </tbody>
    </table>

    <div class="tareasRealizadas">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault"> Mostrar tareas realizadas        
        </label></td>
    </div>


  </div>

    





</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script> -->

</html>