document.addEventListener("DOMContentLoaded", function () {
  //Creo el array estudiantes
  let estudiantes = [];

  // Función para llenar la tabla
  function llenarTablaEstudiantes(estudiantes) {
    // Obtener la referencia del cuerpo de la tabla
    const tabla = document.querySelector("#table-usu tbody");

    // Limpiar cualquier fila existente en la tabla
    tabla.innerHTML = "";

    // Iterar sobre los usuarios y crear filas
    estudiantes.forEach((estudiante) => {
      const fila = document.createElement("tr");

      // Crear celdas para cada dato del usuario
      /**Las propiedades que trae el Json son las siguientes
       * id_usuario,nombre,apellido
       */
      const celdaId = document.createElement("td");
      celdaId.textContent = estudiante.id_usuario; //el nombre de la propiedad debe ser "id_usuario"

      const celdaNombre = document.createElement("td");
      celdaNombre.textContent = estudiante.nombre; // el nombre de la propiedad debe ser "nombre"

      const celdaApellido = document.createElement("td");
      celdaApellido.textContent = estudiante.apellido; // el nombre de la propiedad debe ser "apellido"

      // Agregamos las celdas a la fila
      fila.appendChild(celdaId);
      fila.appendChild(celdaNombre);
      fila.appendChild(celdaApellido);

      // Agregamos la fila a la tabla
      tabla.appendChild(fila);
    });
  }

  //Traigo los datos del controlador.
  fetch(
    "http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerProfesor.php",
    {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    }
  )
    .then((response) => response.json())
    .then((data) => {
      //console.log("Datos recibidos:", data);
      if (Array.isArray(data)) {
        estudiantes = data;
        llenarTablaEstudiantes(estudiantes);
      } else {
        console.error("Error al obtener los estudiantes:", data.message);
      }
    })
    .catch((error) =>
      console.error("Error al obtener los estudiantes:", error)
    );

  document.getElementById("generarPdf").addEventListener("click", () => {
    window.open(
      "http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerProfesor.php?action=pdfREstudiantes",
      "_blank" // Abre en una nueva pestaña
    );
  });
});
