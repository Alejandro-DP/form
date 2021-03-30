<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Movie´s</title>
</head>
<body>
    <div class="container col-lg-5">
        <div class="card justify-content-md-center">
            <div class=" card-body"></div>
                <form class="form-horizontal justify-content-center" id="formulario" method="POST" action="">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="name" id="nombre" placeholder="last name / name">
                        <span class="font-weight-light ml-1 require">Requerido</span>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" class="form-control" name="email" id="Email" placeholder="ejemplo@ejemplo.com">
                        <span class="font-weight-light ml-1 require">Requerido</span>
                    </div>
                    <div class="form-group">
                        <label for="paquete" >Paquete</label>
                        <select class="form-control" name="package" id="paquete">
                            <option value="">Selecciona un paquete</option>
                            <option value="a">Paquete A</option>
                            <option value="b">Paquete B</option>
                            <option value="c">Paquete C</option>
                        </select>
                        <span class="font-weight-light ml-1 require">Requerido</span>
                    </div>
                    <div class="form-group">
                        <label for="Movie">Movie</label>
                        <input type="text " name="movie" class="form-control" id="Movie" placeholder="Nombre de la pelicula">
                        <span class="font-weight-light ml-1 require">Requerido</span>
                    </div>
                    <div class="form-group">
                        <span>Precio : $100 MXN</span>
                        <input type="hidden" name="price" class="form-control"  value="100">
                        
                    </div>
                    
                    <div class="form-group"> 
                        <button type="submit" class="btn btn-primary btn-block" name="enviar">Pagar</button>
                    </div>
                    
                </form>
                <?php
                 include("php/validar.php");
                ?>
            </div>
        </div>
    </div>
    
    <script src="js/app.js"></script>
</body>
</html>