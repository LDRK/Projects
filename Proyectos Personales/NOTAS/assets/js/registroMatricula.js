// Primero, hacemos la solicitud para obtener los estudiantes y materias
let estudiantes = [];
let materias = [];

fetch(
  "http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerMatricula.php",
  {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  }
)
  .then((response) => {
    if (!response.ok) {
      throw new Error("Error en la repuesta del servidor: ");
    }
    return response.json();
  })
  .then((data) => {
    //console.log("Datos recibidos del servidor:", data);
    if (Array.isArray(data.estudiantes)) {
      estudiantes = data.estudiantes;
    } else {
      console.error("No se recibiron datos de estudiantes");
    }

    if (Array.isArray(data.materias)) {
      materias = data.materias;
    } else {
      console.error("No se recibiron datos de materias");
    }
  })
  .catch((error) =>
    console.error("Error al obtener los estudiantes y materias:", error)
  );

/**Dinamismo del formulario den registro de materias */
document.getElementById("numMatricula").addEventListener("change", function () {
  const numMatricula = this.value;
  const formContainer = document.getElementById("matriculasForm");
  formContainer.innerHTML = ""; // Limpiar el formulario anterior

  for (let i = 1; i <= numMatricula; i++) {
    // Crear un grupo de inputs para cada materia
    const formGroup = document.createElement("div");
    formGroup.classList.add("mb-3");

    formGroup.innerHTML = `
            <div class="space-y-6 items-center justify-center">
              <h5 class="text-xl text-center font-medium text-black dark:text-white">Matricula ${i}</h5>

            <div>
              <label for="estudiante${i}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estudiante</label>
              <select class="w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring focus:border-blue-500" id="estudiante${i}" name="estudiante${i}" required>
                  <option value="">Selecciona un estudiante</option>
              </select>
            </div>

            <div>
              <label for="materia${i}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Materia</label>
              <select class="w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring focus:border-blue-500" id="materia${i}" name="materia${i}" required>
                  <option value="">Selecciona la materia</option>
              </select>
            </div>

            <div>
              <label for="semestre${i}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">semestre</label>
              <input type="number" class="w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring focus:border-blue-500" id="semestre${i}" name="semestre${i}" required readonly>
           </div>
        `;

    formContainer.appendChild(formGroup);

    // Agregar los estudiante al select correspondiente
    const selectEstudiantes = document.getElementById(`estudiante${i}`);
    estudiantes.forEach((estudiante) => {
      const option = document.createElement("option");
      option.value = estudiante.id_usuario;
      option.textContent = `${estudiante.nombre} ${estudiante.apellido}`;
      selectEstudiantes.appendChild(option);
    });

    // Agregar las materias al select correspondiente
    const selectMaterias = document.getElementById(`materia${i}`);
    materias.forEach((materia) => {
      const option = document.createElement("option");
      option.value = materia.id_materia;
      option.textContent = `${materia.nombre}`;
      selectMaterias.appendChild(option);
    });

    // Añadir un event listener para detectar el cambio en el select de materias
    selectMaterias.addEventListener("change", function () {
      const selectedMateriaId = this.value;
      const selectedMateria = materias.find(
        (materia) => materia.id_materia == selectedMateriaId
      );

      if (selectedMateria) {
        // Asignar automáticamente el semestre correspondiente
        document.getElementById(`semestre${i}`).value =
          selectedMateria.id_semestre;
      }
    });
  }
});

function registrarMatricula() {
  const formMatricula = document.getElementById("matriculasForm");
  const matricula = [];

  // Recorrer los campos dinámicos y construir el array de materias
  for (let i = 1; i <= formMatricula.childElementCount; i++) {
    const estudiante = document.getElementById(`estudiante${i}`).value;
    const materia = document.getElementById(`materia${i}`).value;
    const semestre = document.getElementById(`semestre${i}`).value;

    matricula.push({
      estudiante: estudiante,
      materia: materia,
      semestre: semestre,
    });
  }

  const datos = {
    accion: "crear",
    matricula: matricula,
  };
  console.log(datos);
  try {
    fetch(
      "http://localhost/Git%20Projects/Sena/NUBE/NOTAS/controllers/controllerMatricula.php",
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Cache-Control": "no-cache", // Desactivar caché
        },
        body: JSON.stringify(datos), // Convertir los datos en un objeto JSON
      }
    )
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          swal("Good job!", "Matricula Registrada!", "success");
          formMatricula.reset(); // reseteo el formRegistro
        } else {
          alert("Error al registrar la matricula: " + data.message);
        }
      })
      .catch((error) => console.error("Error:", error));
  } catch (error) {
    console.error("Error en la construcción del JSON:", error, data);
  }
}
