let notas = [];
document.addEventListener("DOMContentLoaded", function () {
  // Función para llenar la tabla
  function llenarTablaNotas(notas) {
    // Obtener la referencia del cuerpo de la tabla
    const tabla = document.querySelector("#tabla-notas tbody");

    // Limpiar cualquier fila existente en la tabla
    tabla.innerHTML = "";

    // Iterar sobre los usuarios y crear filas
    notas.forEach((nota) => {
      const fila = document.createElement("tr");
      fila.classList.add(
        "bg-white",
        "border-b",
        "dark:bg-gray-800",
        "dark:border-gray-700",
        "border-gray-200"
      );

      // Crear celdas para cada dato del usuario
      /**Las propiedades que trae el Json
       */
      const celdaMateria = document.createElement("th");
      celdaMateria.scope = "row";
      celdaMateria.textContent = nota.materia; //el nombre de la propiedad debe ser "materia"
      celdaMateria.classList.add(
        "px-6",
        "py-4",
        "font-medium",
        "text-gray-900",
        "whitespace-nowrap",
        "dark:text-white"
      );

      const celdaNota = document.createElement("td");
      celdaNota.textContent = nota.nota; // el nombre de la propiedad debe ser "nota"
      celdaNota.classList.add("px-6", "py-4");

      const celdaPeriodo = document.createElement("td");
      celdaPeriodo.textContent = nota.id_periodo; // el nombre de la propiedad debe ser "periodo"
      celdaPeriodo.classList.add("px-6", "py-4");

      // Agregamos las celdas a la fila
      fila.appendChild(celdaMateria);
      fila.appendChild(celdaNota);
      fila.appendChild(celdaPeriodo);

      // Agregamos la fila a la tabla
      tabla.appendChild(fila);
    });
  }

  function llenarTablaEstado(notas) {
    const tablaEstado = document.querySelector("#tabla-estado tbody");
    tablaEstado.innerHTML = ""; // Limpiar la tabla

    const promediosPorMateria = {};

    // Calcular promedios por materia
    notas.forEach((item) => {
      if (!promediosPorMateria[item.materia]) {
        promediosPorMateria[item.materia] = {
          totalPeriodo: [0, 0, 0],
          conteoPeriodo: [0, 0, 0],
        };
      }

      // Sumar las notas en el período correspondiente
      promediosPorMateria[item.materia].totalPeriodo[item.id_periodo - 1] +=
        item.nota;
      promediosPorMateria[item.materia].conteoPeriodo[item.id_periodo - 1] += 1;
    });

    // Calcular promedios y estado
    for (const materia in promediosPorMateria) {
      const materiaData = promediosPorMateria[materia];
      const promedios = materiaData.totalPeriodo.map((total, index) => {
        return materiaData.conteoPeriodo[index]
          ? total / materiaData.conteoPeriodo[index]
          : 0;
      });

      const promedioFinal =
        promedios.reduce((sum, avg) => sum + avg, 0) / promedios.length;
      const estado = promedioFinal >= 6 ? "Ganó" : "Perdió";

      // Crear fila para la tabla de estado
      const fila = document.createElement("tr");
      fila.classList.add(
        "bg-white",
        "border-b",
        "dark:bg-gray-800",
        "dark:border-gray-700",
        "border-gray-200"
      );
      const celdaMateria = document.createElement("th");
      celdaMateria.textContent = materia;
      celdaMateria.classList.add(
        "px-6",
        "py-4",
        "font-medium",
        "text-gray-900",
        "whitespace-nowrap",
        "dark:text-white"
      );

      const celdaEstado = document.createElement("td");
      celdaEstado.textContent = estado;
      celdaEstado.classList.add("px-6", "py-4");

      fila.appendChild(celdaMateria);
      fila.appendChild(celdaEstado);
      tablaEstado.appendChild(fila);
    }
  }

  //Hacemos la solicitud para traer los datos del controlador.
  fetch(
    "http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerGetNotas.php",
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
        notas = data;
        llenarTablaNotas(notas);
        llenarTablaEstado(notas);
      } else {
        console.error("Error al obtener los datos:", data.message);
      }
    })
    .catch((error) => console.error("Error al obtener los datos:", error));
});
