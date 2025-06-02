document.addEventListener("DOMContentLoaded", function () {
  let consolidado = [];

  //Codigo del consolidado

  // Función para llenar la tabla
  function llenarTablaConsolidado(consolidado) {
    // Obtener la referencia del cuerpo de la tabla
    const tabla = document.querySelector("#table-conso tbody");

    // Limpiar cualquier fila existente en la tabla
    tabla.innerHTML = "";

    // Iterar sobre los usuarios y crear filas
    consolidado.forEach((datos) => {
      const fila = document.createElement("tr");
      fila.classList.add(
        "bg-white",
        "border-b",
        "dark:bg-gray-800",
        "dark:border-gray-700",
        "border-gray-200"
      );

      // Crear celdas para cada dato del usuario
      /**Las propiedades que trae el Json son las siguientes
       * id_usuario,nombre,apellido,periodo 1, periodo 2, periodo 3.
       */
      const celdaId = document.createElement("th");
      celdaId.scope = "row";
      celdaId.textContent = datos.id_usuario; //el nombre de la propiedad debe ser "id_usuario"
      celdaId.classList.add(
        "px-6",
        "py-4",
        "font-medium",
        "text-gray-900",
        "whitespace-nowrap",
        "dark:text-white"
      );

      const celdaNombre = document.createElement("td");
      celdaNombre.textContent = datos.nombre; // el nombre de la propiedad debe ser "nombre"
      celdaNombre.classList.add("px-6", "py-4");

      const celdaApellido = document.createElement("td");
      celdaApellido.textContent = datos.apellido; // el nombre de la propiedad debe ser "apellido"
      celdaApellido.classList.add("px-6", "py-4");

      const celdaMateria = document.createElement("td");
      celdaMateria.textContent = datos.materia; // el nombre de la propiedad debe ser "materia"
      celdaMateria.classList.add("px-6", "py-4");

      const celdaPeriodo1 = document.createElement("td");
      celdaPeriodo1.textContent = datos.periodo_1; // el nombre de la propiedad debe ser "periodo_1"
      celdaPeriodo1.classList.add("px-6", "py-4");

      const celdaPeriodo2 = document.createElement("td");
      celdaPeriodo2.textContent = datos.periodo_2; // el nombre de la propiedad debe ser "periodo_2"
      celdaPeriodo2.classList.add("px-6", "py-4");

      const celdaPeriodo3 = document.createElement("td");
      celdaPeriodo3.textContent = datos.periodo_3; // el nombre de la propiedad debe ser "periodo_3"
      celdaPeriodo3.classList.add("px-6", "py-4");

      const promedio =
        (datos.periodo_1 + datos.periodo_2 + datos.periodo_3) / 3;

      const estado = promedio >= 6 ? "Gano" : "perdio";

      const celdaEstado = document.createElement("td");
      celdaEstado.textContent = estado; // el nombre de la propiedad debe ser "periodo_3"

      // Agregamos las celdas a la fila
      fila.appendChild(celdaId);
      fila.appendChild(celdaNombre);
      fila.appendChild(celdaApellido);
      fila.appendChild(celdaMateria);
      fila.appendChild(celdaPeriodo1);
      fila.appendChild(celdaPeriodo2);
      fila.appendChild(celdaPeriodo3);
      fila.appendChild(celdaEstado);

      // Agregamos la fila a la tabla
      tabla.appendChild(fila);
    });
  }

  //Traigo los datos del controlador.
  fetch(
    "http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerConsolidado.php",
    {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    }
  )
    .then((response) => response.json())
    .then((data) => {
      console.log("Datos recibidos:", data);
      if (Array.isArray(data)) {
        consolidado = data;
        llenarTablaConsolidado(consolidado);
      } else {
        console.error("Error al obtener los datos:", data.message);
      }
    })
    .catch((error) => console.error("Error al obtener los datos:", error));
});
