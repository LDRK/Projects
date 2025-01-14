<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Login</title>
</head>

<body>

    <div class="row g-0">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
    <div class="row g-0">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <section class="section">
                <form class="formulario-login" method="post" action="../../php/form/loginUsers.php">
                    <label for="">Usuario</label>
                    <input type="text" class="form-control input" name="usernameLogin" placeholder="Ingrese su usuario"
                        required>
                    <label for="">Contraseña</label>
                    <input type="password" class="form-control input " name="passwordLogin"
                        placeholder="Ingrese su contraseña" required>

                    <button type="submit" class="btn btn-primary m-2" name="ilogin">Iniciar Sesion</button>
                    <br>
                    <a href="./singup.php">¿No tienes cuenta?</a>

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