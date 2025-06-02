document.addEventListener("DOMContentLoaded", function () {
  // Obtener el formulario de registro de usuarios.
  const formRegistro = document.getElementById("form-registroUsu");
  // Evento para el botón de crear usuario.
  formRegistro.addEventListener("submit", function (event) {
    event.preventDefault(); // Evitamos que el formulario se envíe de la manera tradicional

    // Capturar los datos del formulario
    let identificacion = document.querySelector("#identificacion").value;
    let nombre = document.querySelector("#nombre").value;
    let apellido = document.querySelector("#apellido").value;
    let username = document.querySelector("#username").value;
    let contrasena = document.querySelector("#password").value;
    let tipoUsuario = document.querySelector("#profesor").checked
      ? "profesor"
      : "estudiante";
    // Determinar el rol según el checkbox seleccionado
    // let tipoUsuario = "";
    // if (document.querySelector("#profesor").checked) {
    //   tipoUsuario = "profesor";
    // } else if (document.querySelector("#estudiante").checked) {
    //   tipoUsuario = "estudiante";
    // }
    // console.log(tipoUsuario);
    // Obtener el valor del botón de acción (crear o editar) para saber qué acción realizar al enviar el formulario.
    let accion = document.querySelector("#btn-crearUsu").value;

    // Convertir los datos a JSON
    let datosUsuario = {
      accion: accion,
      identificacion: identificacion,
      nombre: nombre,
      apellido: apellido,
      username: username,
      contrasena: contrasena,
      tipoUsuario: tipoUsuario,
    };
    // console.log(datosUsuario);

    try {
      // Construir el JSON a enviar al controlador de usuarios. El JSON contiene los datos del usuario y el rol.
      const jsonData = JSON.stringify(datosUsuario);
      // console.log("Datos JSON a enviar:", jsonData);
      // Hacemos la solicitud usando fetch
      fetch(
        "http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerUsuario.php",
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
            swal("Good job!", "Usuario registrado!", "success");

            //reseteo el checkBox
            // document.querySelector("#profesor").checked = false;
            // document.querySelector("#estudiante").checked = false;
            formRegistro.reset(); // reseteo el formRegistro
          } else {
            alert("Error al registrar el usuario: " + data.message);
          }
        })
        .catch((error) => console.error("Error:", error));
    } catch (error) {
      console.error("Error en la construcción del JSON:", error);
    }
  });
});
