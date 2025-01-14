<?php
//require_once('../../php/conexion/conexion.php');
session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header('Location: ./login.php');
    exit();
}


//Codigo para mostar el modal en modificar el usuario, poder enlazar el boton modificar en la tabla
$mostarModalM = false;
$modificarP = null;

require_once('../../php/form/registroPersonal.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Dasboard</title>
</head>

<body>

    <header class="header">
        <?php require_once '../components/navbar.php';  ?>
    </header>

    <div class="row g-0">
        <div class="col-md-4">
            <button type="button" class="btn btn-primary btnDasRegistar " data-bs-toggle="modal"
                data-bs-target="#modalRegistar" id="btnModal">
                Registrar Usuario
            </button>
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
                        <th scope="col">FOTO</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDO PATERNO</th>
                        <th scope="col">APELLIDO MATERNO</th>
                        <th scope="col">CORREO</th>
                        <th scope="col">DEPARTAMENTO</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // require('./conexion/conexion.php');
                    require_once('../../php/form/tablaEmpleados.php');


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

    <!-- Modal Registar persona-->
    <div class="modal fade" id="modalRegistar" tabindex="-1" aria-labelledby="modalRegistarLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header titulo-modal">
                    <h5 class="modal-title " id="modalRegistarLabel">Registrar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del formulario para registrar usuario -->
                    <section class="section">
                        <form action="../../php/form/registroPersonal.php" class="formulario-modal" method="post">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control input-modal" name="nombre" required>
                            <label for="">Apellido Paterno</label>
                            <input type="text" class="form-control input-modal" name="apellidoP" required>
                            <label for="">Apellido Materno</label>
                            <input type="text" class="form-control input-modal" name="apellidoM" required>
                            <label for="">Correo</label>
                            <input type="email" class="form-control input-modal" name="email" required>
                            <label for="">Departamento</label>
                            <input type="text" class="form-control input-modal" name="departamento" required>
                            <label for="">Foto</label>
                            <input type="file" class="form-control input-modal" name="foto">
                            <div class="modal-footer pie-modal">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" name="iregistrar">Registar</button>
                            </div>
                        </form>
                    </section>
                </div>
                <!-- <div class="modal-footer pie-modal">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" name="iregistrar">Registar</button>
                        </div> -->
            </div>
        </div>
    </div>

    <!-- Modal Modificar Usuario-->
    <div class="modal fade" id="modalModificar" tabindex="-1" aria-labelledby="modal"
        aria-labelledby="modalModificarabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header titulo-modal">
                    <h5 class="modal-title" id="modalModificarabel">Modificar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del formulario para modificar usuario -->
                    <section class="section">
                        <form action="../../php/form/registroPersonal.php" class="formulario-modal" method="post">
                            <input type="hidden" name="idPersona" value="<?= $modificarP['id_persona'] ?>">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control input-modal" name="nombre"
                                value="<?= $modificarP['nombre']; ?>">
                            <label for="">Apellido Paterno</label>
                            <input type="text" class="form-control input-modal" name="apellidoP"
                                value="<?= $modificarP['apellido_paterno']; ?>">
                            <label for="">Apellido Materno</label>
                            <input type="text" class="form-control input-modal" name="apellidoM"
                                value="<?= $modificarP['apellido_materno']; ?>">
                            <label for="">Correo</label>
                            <input type="email" class="form-control input-modal" name="email"
                                value="<?= $modificarP['correo']; ?>">
                            <label for="">Departamento</label>
                            <input type="text" class="form-control input-modal" name="departamento"
                                value="<?= $modificarP['departamento']; ?>">
                            <label for="">Foto</label>
                            <input type="file" class="form-control input-modal" name="foto"
                                value="<?= $modificarP['foto']; ?>">

                            <div class="modal-footer pie-modal">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" name="iModificar">Modificar
                                    Usuario</button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- codigo para mostar el modal -->
    <?php if ($mostarModalM == true) { ?> <script>
    const modal = new bootstrap.Modal(document.getElementById('modalModificar'), {});
    modal.show();
    </script>
    <?php } ?>


    <!-- Script que activa la funcion del modal -->
    <script>
    //Modal Registrar
    const modalRegistar = document.getElementById('modalRegistar')
    const btnRegistrar = document.getElementById('btnModal')

    modalRegistar.addEventListener('shown.bs.modal', () => {
        btnRegistrar.focus()
    })

    //Modal Modificar
    // const modalModificar = document.getElementById('modalModificar')
    const btnModificar = document.getElementById('btnModalMdf')

    /* modalModificar.addEventListener('shown.bs.modal', () => {
        btnModificar.focus()
    }) */
    </script>
</body>

</html>