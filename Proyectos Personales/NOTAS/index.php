<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./assets/img/logo-principal.svg" />
    <link href="./assets/css/output.css" rel="stylesheet">
    <title>Login</title>
</head>

<body class="bg-gray-100 dark:bg-gray-900">

    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img src="./assets/img/logo-principal.svg" alt="Logo Proncipal" class="">
                <span class="self-center text-2xl ml-2 font-semibold whitespace-nowrap dark:text-white">EduNotas</span>
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Iniciar Sesion
                    </h1>
                    <form id="form-inicio" class="space-y-4 md:space-y-6" method="post">
                        <div>
                            <label for="username"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usuario</label>
                            <input type="text" name="username" id="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="ldrk" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <div class="flex items-center justify-between">

                            <a href="#"
                                class="text-sm font-medium text-primary-600 hover:underline dark:text-white">Olvidaste
                                la contraseña?</a>
                        </div>
                        <button type="submit" id="btn-ingresar" value="ingresar"
                            class="w-full text-white bg-primary-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ingresar</button>

                    </form>
                </div>
            </div>
        </div>
    </section>



    <!-- Modal Pedir Usuario -->
    <?php // require_once './components/modalRegistrarUsu.php'; 
    ?>
    <!-- Fin Modal Pedir Usuario  -->




    <!-- <script src="./assets/js/scriptDOM.js"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./assets/js/login.js"></script>
</body>

</html>