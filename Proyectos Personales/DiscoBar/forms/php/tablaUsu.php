<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Usuarios</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <a class="navbar-brand" href="#">
            <img src="../assets/img/logo2.png" width="150" height="50" class="d-inline-block align-top" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Funciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container table-container mt-5 pt-5">
        <h2>Tabla de Datos</h2>
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Contraseña</th>
                    <th>Correo</th>
                    <th>Cédula</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- 10 Filas de datos editables -->
                <tr>
                    <td>Juan Pérez</td>
                    <td>****</td>
                    <td>juan@example.com</td>
                    <td>123456789</td>
                    <td><button class="btn btn-danger btn-sm delete-row">Eliminar</button></td>
                </tr>
                <tr>
                    <td>María García</td>
                    <td>****</td>
                    <td>maria@example.com</td>
                    <td>987654321</td>
                    <td><button class="btn btn-danger btn-sm delete-row">Eliminar</button></td>
                </tr>
                <tr>
                    <td>Carlos López</td>
                    <td>****</td>
                    <td>carlos@example.com</td>
                    <td>456123789</td>
                    <td><button class="btn btn-danger btn-sm delete-row">Eliminar</button></td>
                </tr>
                <tr>
                    <td>Ana Martínez</td>
                    <td>****</td>
                    <td>ana@example.com</td>
                    <td>321654987</td>
                    <td><button class="btn btn-danger btn-sm delete-row">Eliminar</button></td>
                </tr>
                <tr>
                    <td>José Fernández</td>
                    <td>****</td>
                    <td>jose@example.com</td>
                    <td>852963741</td>
                    <td><button class="btn btn-danger btn-sm delete-row">Eliminar</button></td>
                </tr>

            </tbody>
        </table>
    </div>



</body>

</html>