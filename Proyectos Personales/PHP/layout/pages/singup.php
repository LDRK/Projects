<?php
session_start();

require_once('../../php/form/validaciones/valiRegistroUsers.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Registro</title>
</head>

<body>

    <div class="row g-0">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
    <div class="row g-0">
        <div class="col-md-4"> </div>

        <div class="col-md-4">
            <section class="section">
                <form class="formulario-singup" method="post" action="../../php/form/registroUsers.php">
                    <!-- Inicio Campo nombre -->
                    <label for="">Nombre</label>
                    <input type="text" class="form-control input" name="nombre" placeholder="Ingrese su nombre"
                        value="<?= $nombre;?>" required>
                    <span class="error text-danger"> <?= $nombreError;?></span>
                    <br>
                    <!-- Fin Campo nombre -->
                    <!-- Inicio Campo usuario -->
                    <label for="">Usuario</label>
                    <input type="text" class="form-control input" name="usuario" placeholder="Ingrese su usuario"
                        value="<?= $username;?>" required>
                    <span class="error text-danger"> <?= $userNameError;?></span>
                    <br>
                    <!-- Fin Campo usuario -->
                    <!-- Inicio Campo contraseña -->
                    <label for="">Contraseña</label>
                    <input type="password" class="form-control input " name="password"
                        placeholder="Ingrese su contraseña" value="<?= $contrasena;?>" required>
                    <span class="error text-danger"> <?= $contrasenaError;?></span>
                    <br>
                    <!-- Fin Campo contraseña -->
                    <!-- Inicio Campo Correo -->
                    <label for="">Correo</label>
                    <input type="text" class="form-control input" name="correo" placeholder="Ingrese su correo"
                        value="<?= $correo;?>" required>
                    <span class="error text-danger"> <?= $correoError;?></span>
                    <!-- Fin Campo correo -->
                    <button type="submit" class="btn btn-primary m-2" name="iregistrar">Registar</button>
                    <br>
                    <a href="./login.php">¿Ya tienes cuenta?</a>
                </form>
            </section>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row g-0">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>


</body>


</html>