document.addEventListener("DOMContentLoaded", function () {
  // Obtener el formulario de registro de usuarios.
  const formRegistro = document.getElementById("form-inicio");
  // Evento para el botón de crear usuario.
  formRegistro.addEventListener("submit", function (event) {
    event.preventDefault(); // Evitamos que el formulario se envíe de la manera tradicional

    // Capturar los datos del formulario
    let username = document.querySelector("#username").value;
    let contrasena = document.querySelector("#password").value;

    let accion = document.querySelector("#btn-ingresar").value;

    // Convertir los datos a JSON
    let datosUsuario = {
      accion: accion,
      username: username,
      contrasena: contrasena,
    };
    //console.log(datosUsuario);

    try {
      // Construir el JSON a enviar al controlador de usuarios. El JSON contiene los datos del usuario y el rol.
      const jsonData = JSON.stringify(datosUsuario);
      // console.log("Datos JSON a enviar:", jsonData);
      // Hacemos la solicitud usando fetch
      fetch(
        "http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerLogin.php",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "Cache-Control": "no-cache", // Desactivar caché
          },
          body: jsonData,
          // Enviar el JSON con los datos del usuario
        }
      )
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            window.location.href =
              "http://localhost/Git%20Projects/Sena/NUBE/NOTAS/views/pages/dashboard.php";
            //swal("Good job!", "acceso concedido!", "success");
            formRegistro.reset(); // reseteo el formRegistro
          } else {
            swal("Oops", data.message || "Credenciales incorrectas!", "error");
          }
        })
        .catch((error) => {
          console.error("Error:", error);
          wal("Oops", "Ocurrió un error en la solicitud.", "error");
        });
    } catch (error) {
      console.error("Error en la construcción del JSON:", error);
    }
  });
});
