<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary nav">
        <div class="container-fluid">
            <img src="../../assets/img/logo-design.png" alt="Logo" style="width: 50px;" height="50px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-auto listaUl" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item me-3">
                        <a class="nav-link active" aria-current="page" href="./dashboard.php">Inicio</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link active " aria-current="page" href="../pages/dashboard.php">Registar</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link active" aria-current="page" href="#">Usuarios</a>
                    </li>

                    <li class="nav-item dropdown me-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Mas
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end ">
                            <li><a class="dropdown-item" href="../pages/reporte.php">Reporte</a></li>
                            <li><a class="dropdown-item" href="#">Configuracion</a></li>
                            <li><a class="dropdown-item" href="#">Ayuda</a></li>
                            <li><a class="dropdown-item" href="../../php/form/cerrarSesion.php">Cerrar Sesion</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>