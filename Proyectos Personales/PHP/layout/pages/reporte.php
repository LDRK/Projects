<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Reporte</title>
</head>

<body>
    <header class="header">
        <?php require_once '../components/navbar.php';  ?>
    </header>


    <div class="row g-0">
        <div class="col-md-4">

        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>

    </div>
    </div>
    <div class="row g-0">
        <div class="col-md-12 fila">
            <table class="table  tablaRegistros ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">USUARIO</th>
                        <th scope="col">FECHA</th>
                        <th scope="col">HORA</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    // require('./conexion/conexion.php');
                    require_once('../../php/form/tablaUsers.php');


                    ?>
                </tbody>

            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
    </div>
</body>

</html>